<?php
/**
 * Created by PhpStorm.
 * User: ipitchkhadze
 * Date: 22.01.2019
 * Time: 17:41
 */

namespace App\Services;


class Helpers
{
    public static function transliterate ($string){
        $str = mb_strtolower($string, 'UTF-8');

        $leter_array = array(
            'a' => 'а',
            'b' => 'б',
            'v' => 'в',
            'g' => 'г',
            'd' => 'д',
            'e' => 'е,э',
            'jo' => 'ё',
            'zh' => 'ж',
            'z' => 'з',
            'i' => 'и,i',
            'j' => 'й',
            'k' => 'к',
            'l' => 'л',
            'm' => 'м',
            'n' => 'н',
            'o' => 'о',
            'p' => 'п',
            'r' => 'р',
            's' => 'с',
            't' => 'т',
            'u' => 'у',
            'f' => 'ф',
            'kh' => 'х',
            'ts' => 'ц',
            'ch' => 'ч',
            'sh' => 'ш',
            'shch' => 'щ',
            '' => 'ъ',
            'y' => 'ы',
            '' => 'ь',
            'yu' => 'ю',
            'ya' => 'я',
        );

        foreach ($leter_array as $leter => $kyr){
            $kyr = explode(',',$kyr); // кирилические строки разобьем в массив с разделителем запятая.
            // в строке $str мы пытаемся отыскать символы кирилицы $kyr и все найденные совпадения заменяем на ключи $leter
            $str = str_replace($kyr, $leter, $str);
        }

        // теперь необходимо учесть правильность формирования URL
        // поиск и замена по регулярному выражению.
        // перв. выраж. указываем рег выражение. втор.выраж. строка или массив строк для замены
        //   //  регуляр выражение  ()+  может повторяться 1 и более раз.,   \s пробельный символ сразу же заменяется на '-'
        // | Логическое или. либо то условие либо что указано справа от |  притом справа укажем диапазон [A-Za-z0-9-]
        //  ^ Логическое отрицание. т.е. заменяем либо пробельный символ на тире, либо любой другой символ, что не входит в указанный диапазон.
        $str = preg_replace('/(\s|[^A-Za-z0-9-])+/', '-', $str);
        $str = trim($str,'-'); // если в конце появится тире, то его удаляем.

        return $str;
    }
}
