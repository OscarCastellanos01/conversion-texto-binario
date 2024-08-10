<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function textToBinary($text) {
        $binary = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $binary .= sprintf("%08b", ord($text[$i]));
        }
        return $binary;
    }

    public function binaryToText($binary) {
        $text = '';
        $binaryArray = str_split($binary, 8);
        foreach ($binaryArray as $bin) {
            $text .= chr(bindec($bin));
        }
        return $text;
    }

    public function convertTextToBinary(Request $request) {
        $text = $request->input('text');
        $binary = $this->textToBinary($text);
        return response()->json(['binary' => $binary]);
    }

    public function convertBinaryToText(Request $request) {
        $binary = $request->input('binary');
        $text = $this->binaryToText($binary);
        return response()->json(['text' => $text]);
    }
}
