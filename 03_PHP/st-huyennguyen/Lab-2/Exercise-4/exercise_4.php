<?php
// Solution 1: preg_match
function matchFormat($variable)
{
    $regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regexUrl = "/^([a-z][a-z0-9+.-]*):(?:\\/\\/((?:(?=((?:[a-z0-9-._~!$&'()*+,;=:]|%[0-9A-F]{2})*))(\\3)@)?(?=(\\[[0-9A-F:.]{2,}\\]|(?:[a-z0-9-._~!$&'()*+,;=]|%[0-9A-F]{2})*))\\5(?::(?=(\\d*))\\6)?)(\\/(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/]|%[0-9A-F]{2})*))\\8)?|(\\/?(?!\\/)(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/]|%[0-9A-F]{2})*))\\10)?)(?:\\?(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/?]|%[0-9A-F]{2})*))\\11)?(?:#(?=((?:[a-z0-9-._~!$&'()*+,;=:@\\/?]|%[0-9A-F]{2})*))\\12)?$/i";
    if (empty($variable)) {
        throw new Exception("Empty variable", 400);
    }
    if (gettype($variable) != 'string') {
        throw new Exception("The variable is not of datatype string", 500);
    }
    if (preg_match($regexMail, $variable) || preg_match($regexUrl, $variable)) {
        return true;
    }
    throw new Exception("Variable does not match Email or Url", 422);
}

// Solution 2: filter_var
function matchFormat2($variable)
{
    switch (true) {
        case empty($variable):
            throw new Exception("Empty variable", 400);
            break;
        case gettype($variable) != 'string':
            throw new Exception("The variable is not of datatype string", 500);
            break;
        case (filter_var($variable, FILTER_VALIDATE_EMAIL) || filter_var($variable, FILTER_VALIDATE_URL)):
            return true;
        default:
            throw new Exception("Variable does not match Email or Url", 422);
    }
}

// Test solution 1
function testHandle($input)
{
    try {
        echo matchFormat2($input);
    } catch (\Exception $e) {
        $message = $e->getMessage();
        $code = $e->getCode();
        echo "Error: [Code $code] $message";
    }
}
$input = "https://www.php.net/manual/en/filter.examples.validation.php";
testHandle($input);
echo "\n";
testHandle(500);
