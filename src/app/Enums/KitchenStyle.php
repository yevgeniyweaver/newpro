<?php


namespace App\Enums;

enum KitchenStyle: string
{
    case Modern  = 'modern';
    case Classic = 'classic';
    case Loft    = 'loft';
    case Minimal = 'minimal';
    case Rustic  = 'rustic';

    public function label(): string
    {
        return match($this) {
            self::Modern  => 'Современный',
            self::Classic => 'Классический',
            self::Loft    => 'Лофт',
            self::Minimal => 'Минимализм',
            self::Rustic  => 'Сельский стиль',
        };
    }

    /**
     * Получить список всех значений для выпадающего списка
     */
    public static function options(): array
    {
        return array_map(
            fn($case) => ['value' => $case->value, 'label' => $case->label()],
            self::cases()
        );
    }
}
