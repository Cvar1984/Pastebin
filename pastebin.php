<?php

/*
 * Copyright (c) 2019 <cvar1984>
 *
 * Licensed unter the Apache License, Version 2.0 or the MIT license, at your
 * option.
 *
 * ********************************************************************************
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * ********************************************************************************
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class PasteBin
{
    protected static $api_dev_key = 'ff9314e0164f30accec4ef969637aa07';
    protected static $api_paste_private = '0';
    protected static $api_paste_expire_date = 'N';
    protected static $api_user_key = '';

    private static function post(string $url, array $fields)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_NOBODY, 0);
        $exec = curl_exec($ch);
        curl_close($ch);
        return $exec;
    }

    public static function paste(string $code, string $name, string $syntax)
    {
        $api_paste_name = urlencode($name);
        $api_paste_format = urlencode($syntax);
        $options = [
            'api_option' => 'paste',
            'api_user_key' => self::$api_user_key,
            'api_paste_private' => self::$api_paste_private,
            'api_paste_name' => $api_paste_name,
            'api_paste_expire_date' => self::$api_paste_expire_date,
            'api_paste_format' => $api_paste_format,
            'api_dev_key' => self::$api_dev_key,
            'api_paste_code' => $code
        ];
        return PasteBin::post('http://pastebin.com/api/api_post.php', $options);
    }
}
$code = readline('Code : ');
$code = trim($code);
$code = file_get_contents(getcwd() . DIRECTORY_SEPARATOR . $code);

$name = readline('Paste name : ');
$name = trim($name);

$syntax = pathinfo($name, PATHINFO_EXTENSION);

echo PasteBin::paste($code, $name, $syntax) . PHP_EOL;
