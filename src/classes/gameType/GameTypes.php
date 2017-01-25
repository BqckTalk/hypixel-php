<?php

namespace Plancke\HypixelPHP\classes\gameType;

use Closure;

class GameTypes {
    const QUAKE = 2;
    const WALLS = 3;
    const PAINTBALL = 4;
    const HUNGERGAMES = 5;
    const TNTGAMES = 6;
    const VAMPIREZ = 7;
    const WALLS3 = 13;
    const ARCADE = 14;
    const ARENA = 17;
    const UHC = 20;
    const MCGO = 21;
    const BATTLEGROUND = 23;
    const SUPER_SMASH = 24;
    const GINGERBREAD = 25;
    const HOUSING = 26;
    const SKYWARS = 51;
    const TRUE_COMBAT = 52;
    const SPEED_UHC = 54;
    const SKYCLASH = 55;

    /**
     * @return array
     */
    public static function getAllTypes() {
        return [
            self::QUAKE,
            self::WALLS,
            self::PAINTBALL,
            self::HUNGERGAMES,
            self::TNTGAMES,
            self::VAMPIREZ,
            self::WALLS3,
            self::ARCADE,
            self::ARENA,
            self::UHC,
            self::MCGO,
            self::BATTLEGROUND,
            self::SUPER_SMASH,
            self::GINGERBREAD,
            self::HOUSING,
            self::SKYWARS,
            self::TRUE_COMBAT,
            self::SPEED_UHC,
            self::SKYCLASH
        ];
    }

    /**
     * @param $id
     *
     * @return GameType|null
     */
    public static function fromID($id) {
        switch ($id) {
            case GameTypes::QUAKE:
                return new GameType('Quake', 'Quake', 'Quake', GameTypes::QUAKE);
            case GameTypes::WALLS:
                return new GameType('Walls', 'Walls', 'Walls', GameTypes::WALLS);
            case GameTypes::PAINTBALL:
                return new GameType('Paintball', 'Paintball', 'Paintball', GameTypes::PAINTBALL);
            case GameTypes::HUNGERGAMES:
                return new GameType('HungerGames', 'Blitz Survival Games', 'BSG', GameTypes::HUNGERGAMES);
            case GameTypes::TNTGAMES:
                return new GameType('TNTGames', 'TNT Games', 'TNT Games', GameTypes::TNTGAMES);
            case GameTypes::VAMPIREZ:
                return new GameType('VampireZ', 'VampireZ', 'VampireZ', GameTypes::VAMPIREZ);
            case GameTypes::WALLS3:
                return new GameType('Walls3', 'Mega Walls', 'MW', GameTypes::WALLS3);
            case GameTypes::ARCADE:
                return new GameType('Arcade', 'Arcade', 'Arcade', GameTypes::ARCADE);
            case GameTypes::ARENA:
                return new GameType('Arena', 'Arena Brawl', 'Arena', GameTypes::ARENA);
            case GameTypes::UHC:
                return new GameType('UHC', 'UHC Champions', 'UHC', GameTypes::UHC);
            case GameTypes::MCGO:
                return new GameType('MCGO', 'Cops and Crims', 'CaC', GameTypes::MCGO);
            case GameTypes::BATTLEGROUND:
                return new GameType('Battleground', 'Warlords', 'Warlords', GameTypes::BATTLEGROUND);
            case GameTypes::SUPER_SMASH:
                return new GameType('SuperSmash', 'Smash Heroes', 'Smash Heroes', GameTypes::SUPER_SMASH);
            case GameTypes::GINGERBREAD:
                return new GameType('GingerBread', 'Turbo Kart Racers', 'TKR', GameTypes::GINGERBREAD);
            case GameTypes::HOUSING:
                return new GameType('Housing', 'Housing', 'Housing', GameTypes::HOUSING, false);
            case GameTypes::SKYWARS:
                return new GameType('SkyWars', 'SkyWars', 'SkyWars', GameTypes::SKYWARS);
            case GameTypes::TRUE_COMBAT:
                return new GameType('TrueCombat', 'Crazy Walls', 'Crazy Walls', GameTypes::TRUE_COMBAT);
            case GameTypes::SPEED_UHC:
                return new GameType('SpeedUHC', 'Speed UHC', 'Speed UHC', GameTypes::SPEED_UHC);
            case GameTypes::SKYCLASH:
                return new GameType('SkyClash', 'SkyClash', 'SkyClash', GameTypes::SKYCLASH);
            default:
                return null;
        }
    }

    /**
     * @param Closure $test
     * @return GameType|null
     */
    public static function fromX(Closure $test) {
        foreach (GameTypes::getAllTypes() as $id) {
            $gameType = GameTypes::fromID($id);
            if ($gameType != null) {
                if ($test($gameType)) {
                    return $gameType;
                }
            }
        }
        return null;
    }

    /**
     * @param $db
     * @return GameType|null
     */
    public static function fromDbName($db) {
        return self::fromX(function (GameType $gameType) use ($db) {
            return $gameType->getDb() == $db;
        });
    }

    /**
     * @param $short
     * @return GameType|null
     */
    public static function fromShort($short) {
        return self::fromX(function (GameType $gameType) use ($short) {
            return $gameType->getShort() == $short;
        });
    }

    /**
     * @param $name
     * @return GameType|null
     */
    public static function fromName($name) {
        return self::fromX(function (GameType $gameType) use ($name) {
            return $gameType->getName() == $name;
        });
    }
}