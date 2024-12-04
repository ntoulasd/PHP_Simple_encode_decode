<?php
// Function to decode a large number using XOR and bitwise shift
function decodeNumber($encodedNumber, $cipher) {
    // Reverse the bitwise shift (shift right), then XOR with cipher to decode
    $shifted = ($encodedNumber >> 3) & 0xFFFFFFFF;  // Right shift by 3 bits and mask
    return $shifted ^ $cipher;  // XOR with the same cipher to revert encoding
}

// Function to encode a large number using XOR and a bitwise shift
function encodeNumber($number, $cipher) {
    // Ensure inputs are integers
    $number = (int)$number;
    $cipher = (int)$cipher;

    // Perform XOR operation
    $xorResult = $number ^ $cipher;

    // Bitwise shift left by 3
    $shiftedResult = $xorResult << 3;

    // Mask to 32 bits
    $maskedResult = $shiftedResult & 0xFFFFFFFF;

    // Handle signed overflow
    if ($maskedResult >= 0x80000000) {
        $maskedResult -= 0x100000000;
    }

    return $maskedResult;
}


?>
