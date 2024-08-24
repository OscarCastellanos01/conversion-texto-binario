<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function textToBinary($text) {
        $binary = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $binary .= sprintf("%08b", ord($text[$i])) . ' ';
        }
        return trim($binary); // Elimina el espacio final extra
    }

    public function binaryToText($binary) {
        $text = '';
        // Elimina espacios adicionales y divide en grupos de 8 bits
        $binaryArray = str_split(str_replace(' ', '', $binary), 8);
        foreach ($binaryArray as $bin) {
            $text .= chr(bindec($bin));
        }
        return $text;
    }

    public function convertTextToBinary(Request $request) {
        $text = $request->text;
        $binary = $this->textToBinary($text);
        return response()->json([
            'binary' => $binary
        ]);
    }

    public function convertBinaryToText(Request $request) {
        $binary = $request->binary;
        $text = $this->binaryToText($binary);
        return response()->json([
            'text' => $text
        ]);
    }
}
