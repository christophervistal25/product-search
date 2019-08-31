<?php
namespace App\Http\Repositories;

use Illuminate\Support\Str;
use App\Http\Repositories\Contracts\FormatterContract;

class CSVFormatter implements FormatterContract
{
    public const DELIMETERS = [
        'PREFIX'               => '("',
        'EXCHANGE_FOR_COMMA'   => '","',
        'EXCHANGE_FOR_RETURN'  => '")',
        'EXCHANGE_FOR_NEWLINE' => ',("',
    ];
    public const SEARCH_FOR = [',', "\r", "\n"];

    public function format(string $content) :string
    {
        $EXCHANGE = [
                self::DELIMETERS['EXCHANGE_FOR_COMMA'],
                self::DELIMETERS['EXCHANGE_FOR_RETURN'],
                self::DELIMETERS['EXCHANGE_FOR_NEWLINE']
        ];

        $content = self::DELIMETERS['PREFIX'] . str_replace(self::SEARCH_FOR, $EXCHANGE, $content);

        return rtrim($content, self::DELIMETERS['EXCHANGE_FOR_NEWLINE']);
    }
}
