<?php
    namespace App\Enums;

    enum Status: int
    {
        case YET = 1;
        case IN_PROGRESS = 2;
        case COMPLETED = 3;

        public function label(): string
        {
            return match($this){
                self::YET => "未着手",
                self::IN_PROGRESS => "進行中",
                self::COMPLETED => "完了",
            };
        }
    }