<?php
class StringUtilsTests 
{
    public static function IsNullOrWhitespace_WhenParamIsNull_ShouldReturnTrue()
    {
        $str = null;
        $result = StringUtils::IsNullOrWhitespace($str);

        if ($result === TRUE)
        {
            print "IsNullOrWhitespace_WhenParamIsNull_ShouldReturnTrue SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not TRUE. $result outcome is: '" . $result . "' \n\n");
        }
    }
    
    public static function IsNullOrWhitespace_WhenParamIsEmpty_ShouldReturnTrue()
    {
        $str = "";
        $result = StringUtils::IsNullOrWhitespace($str);

        if ($result === TRUE)
        {
            print "IsNullOrWhitespace_WhenParamIsEmpty_ShouldReturnTrue SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not TRUE. $result outcome is: '" . $result . "' \n\n");
        }
    }
    
    public static function IsNullOrWhitespace_WhenParamIsWhitespace_ShouldReturnTrue()
    {
        $str = "         ";
        $result = StringUtils::IsNullOrWhitespace($str);

        if ($result === TRUE)
        {
            print "IsNullOrWhitespace_WhenParamIsWhitespace_ShouldReturnTrue SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not TRUE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function IsNullOrWhitespace_WhenParamIsString_ShouldReturnFalse()
    {
        $str = "This is a valid string";
        $result = StringUtils::IsNullOrWhitespace($str);

        if ($result === FALSE)
        {
            print "IsNullOrWhitespace_WhenParamIsString_ShouldReturnFalse SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function IsNullOrWhitespace_WhenParamIsNumeric_ResultShouldBeFalse()
    {
        $str = 123;
        $result = StringUtils::IsNullOrWhitespace($str);

        if ($result === FALSE)
        {
            print "IsNullOrWhitespace_WhenParamIsNumeric_ResultShouldBeFalse SUCCESS!! \n\n";
        }
        else
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Standarize_WhenParamIsStringWithWhitepaceAndUppercase_ResultShouldBeStandarized()
    {
        $str = "  This String Should Be Standarized     ";
        $expected = "this string should be standarized";
        $result = StringUtils::Standarize($str);

        if ($result === $expected)
        {
            print "Standarize_WhenParamIsStringWithWhitepaceAndUppercase_ResultShouldBeStandarized SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Standarize_WhenParamIsWhitepace_ResultShouldBeEmpty()
    {
        $str = "       ";
        $expected = "";
        $result = StringUtils::Standarize($str);

        if ($result === $expected)
        {
            print "Standarize_WhenParamIsStringWithWhitepaceAndUppercase_ResultShouldBeStandarized SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function ValidateEmail_WhenParamHasNoAt_ResultShouldBeFalse()
    {
        $str = "userAtexample.com";
        $result = StringUtils::ValidateEmail($str);

        if ($result === FALSE)
        {
            print "ValidateEmail_WhenParamHasNoAt_ResultShouldBeFalse SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function ValidateEmail_WhenParamHasDoubleAt_ResultShouldBeFalse() 
    {
        $str = "user@ex@mple.com";
        $result = StringUtils::ValidateEmail($str);

        if ($result === FALSE)
        {
            print "ValidateEmail_WhenParamHasDoubleAt_ResultShouldBeFalse SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function ValidateEmail_WhenParamHasNoDomain_ResultShouldBeFalse() 
    {
        $str = "user@example";
        $result = StringUtils::ValidateEmail($str);

        if ($result === FALSE)
        {
            print "ValidateEmail_WhenParamHasNoDomain_ResultShouldBeFalse SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function ValidateEmail_WhenParamStartsWithAt_ResultShouldBeFalse() 
    {
        $str = "@userexample.com";
        $result = StringUtils::ValidateEmail($str);

        if ($result === FALSE)
        {
            print "ValidateEmail_WhenParamStartsWithAt_ResultShouldBeFalse SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not FALSE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function ValidateEmail_WhenParamIsValidString_ResultShouldBeTrue() 
    {
        $str = "user@example.com";
        $result = StringUtils::ValidateEmail($str);

        if ($result === TRUE)
        {
            print "ValidateEmail_WhenParamIsValidString_ResultShouldBeTrue SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not TRUE. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_WhenFirstParameterIsEmpty_ShouldThrowException()
    {
        $str = "";
        $expected = 'Parámetro $str en StringUtils::Cut es inválido.';
        $result = null;
        
        try
        {
            $result = StringUtils::Cut($str, ".");
        }
        catch (Exception $e)
        {
            if ($e->getMessage() === $expected)
            {
                print "Cut_WhenFirstParameterIsEmpty_ShouldThrowException SUCCESS!! \n\n";
            }
            else 
            {
                throw $e;
            }
        }

        if ($result)
        {
            throw new Exception("Exception expected at Cut_WhenFirstParameterIsEmpty_ShouldThrowException. $result value is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_WhenSecondParameterExceedsOneCharacter_ShouldThrowException()
    {
        $str = "valid@string";
        $separator = "INVALID";
        $expected = 'Parámetro $separator en StringUtils::Cut es inválido.';
        $result = null;
        
        try
        {
            $result = StringUtils::Cut($str, $separator);
        }
        catch (Exception $e)
        {
            if ($e->getMessage() === $expected)
            {
                print "Cut_WhenSecondParameterExceedsOneCharacter_ShouldThrowException SUCCESS!! \n\n";
            }
            else 
            {
                throw $e;
            }
        }

        if ($result)
        {
            throw new Exception("Exception expected at Cut_WhenSecondParameterExceedsOneCharacter_ShouldThrowException. $result value is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_DefaultParameters()
    {
        $str = "Left side string/Right side string";
        $separator = "/";
        $expected = "Left side string";
        $result = StringUtils::Cut($str, $separator);

        if ($result === $expected)
        {
            print "Cut_DefaultParameters SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_WhenThirdParmeterIsTrue_ShouldReturnStringToTheRight()
    {
        $str = "Left side string/Right side string";
        $separator = "/";
        $expected = "Right side string";
        $result = StringUtils::Cut($str, $separator, true);

        if ($result === $expected)
        {
            print "Cut_WhenThirdParmeterIsTrue_ShouldReturnStringToTheRight SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_WhenFourthParmeterIsTrue_ShouldReturnStringToTheLeftWithSeparator()
    {
        $str = "Left side string/Right side string";
        $separator = "/";
        $expected = "Left side string/";
        $result = StringUtils::Cut($str, $separator, false, true);

        if ($result === $expected)
        {
            print "Cut_WhenFourthParmeterIsTrue_ShouldReturnStringToTheLeftWithSeparator SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }

    public static function Cut_WhenThirdAndFourthParmeterAreTrue_ShouldReturnStringToTheRightWithSeparator()
    {
        $str = "Left side string/Right side string";
        $separator = "/";
        $expected = "/Right side string";
        $result = StringUtils::Cut($str, $separator, true, true);

        if ($result === $expected)
        {
            print "Cut_WhenThirdAndFourthParmeterAreTrue_ShouldReturnStringToTheRightWithSeparator SUCCESS!! \n\n";
        }
        else 
        {
            throw new Exception("$result is not equal to $expected. $result outcome is: '" . $result . "' \n\n");
        }
    }
}