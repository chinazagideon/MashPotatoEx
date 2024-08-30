<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function saveWords()
    {
        $file = storage_path('app/public/.txt');
        $open = fopen($file, 'r');
        $all_data = array();
        $list = "";
        while (($data = fgetcsv($open, 200, "\n")) !== FALSE) {
            $all_data[] = $data;
            for ($count = 0; $count < count($data); $count++) {
                if (!Dictionary::where('word', $data[$count])->exists() && !empty($data[$count])) {
                    $list .= trim($data[$count]) . ',';
//                    $dictionary = new Dictionary();
//                    $dictionary->word = $data[$count];
//                    $dictionary->status = Dictionary::ACTIVE;
//                    $dictionary->save();
                }
//
            }

        }
        dd($list);


        return true;

    }

    public function getWords()
    {
        $words = Dictionary::where('status', Dictionary::ACTIVE)->inRandomOrder()->take(12)->get();
        $phrase = [];
        foreach ($words as $word) {
            if (strlen($word->word) >= 3) {
                if (!$this->trimSpaces($word->word)) {
                    $phrase[] = $word;
                } else {
                    $phrase[] = $this->getWord($word);
                }
            } else {
                $phrase[] = $this->getWord($word);
            }
        }
        return $phrase;
    }

    public function getWord($reject_word)
    {
        $word = Dictionary::where('status', Dictionary::ACTIVE)->where('word', '!=', $reject_word->word)->inRandomOrder()->first();
        if ($this->trimSpaces($word->word) && strlen($word->word) >= 3) {
            return $word;
        }
        return $this->getWord($word);
    }

    public function trimSpaces($word)
    {
        if (strpos($word, ' ')) {
            return false;
        }

        if (strpos($word, '-')) {
            return false;
        }
        if (strpos($word, "'")) {
            return false;
        }
        return true;
    }


}
