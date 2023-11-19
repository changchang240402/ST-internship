<?php
// ====================================================================
// PHP function (Fix the Spacing)
function correctSpacing($sentence)
{
    return trim(preg_replace('/\s+/', ' ', $sentence));
}
