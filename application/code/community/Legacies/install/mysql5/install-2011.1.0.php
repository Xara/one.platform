<?php
/**
 * This file is part of XNova:Legacies
 *
 * @license Modified BSD
 * @see https://github.com/gplanchat/one.platform
 *
 * Copyright (c) 2009-2010, Grégory PLANCHAT <g.planchat at gmail.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *     - Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     - Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *     - Neither the name of Grégory PLANCHAT nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 *                                --> NOTICE <--
 *  This file is part of the core development branch, changing its contents will
 * make you unable to use the automatic updates manager. Please refer to the
 * documentation for further information about customizing One.Platform.
 *
 */

$this->setSetupConnection('legacies_setup');

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/aks')} (
    `id`                    BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `name`                  VARCHAR(50)         NULL,
    `teilnehmer`            TEXT                NULL,
    `flotten`               TEXT                NULL,
    `ankunft`               INT UNSIGNED        NULL,
    `galaxy`                TINYINT UNSIGNED    NULL,
    `system`                SMALLINT UNSIGNED   NULL,
    `planet`                TINYINT UNSIGNED    NULL,
    `eingeladen`            INT UNSIGNED        NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/aks', 'legacies_read',  array('SELECT'))
    ->grant('legacies/aks', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/aks', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/alliance')} (
    `id`                    BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `ally_name`             VARCHAR(32)         NOT NULL,
    `ally_tag`              VARCHAR(8)          NOT NULL,
    `ally_owner`            BIGINT UNSIGNED     NOT NULL    DEFAULT 0,
    `ally_register_time`    TIMESTAMP           NOT NULL,
    `ally_description`      TEXT                NULL,
    `ally_web`              VARCHAR(255)        NULL,
    `ally_text`             TEXT                NULL,
    `ally_image`            VARCHAR(255)        NULL,
    `ally_request`          TEXT                NULL,
    `ally_request_waiting`  TEXT                NULL,
    `ally_request_notallow` BOOL                NOT NULL    DEFAULT FALSE,
    `ally_owner_range`      VARCHAR(32)         NULL,
    `ally_ranks`            TEXT                NULL,
    `ally_members`          SMALLINT UNSIGNED   NOT NULL    DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/alliance', 'legacies_read',  array('SELECT'))
    ->grant('legacies/alliance', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/alliance', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/annonce')} (
    `id`                    SMALLINT UNSIGNED   NOT NULL    AUTO_INCREMENT,
    `user`                  TEXT                NOT NULL,
    `galaxie`               TINYINT UNSIGNED    NOT NULL,
    `systeme`               SMALLINT UNSIGNED   NOT NULL,
    `metala`                DECIMAL(65,0)       NOT NULL,
    `cristala`              DECIMAL(65,0)       NOT NULL,
    `deuta`                 DECIMAL(65,0)       NOT NULL,
    `metals`                DECIMAL(65,0)       NOT NULL,
    `cristals`              DECIMAL(65,0)       NOT NULL,
    `deuts`                 DECIMAL(65,0)       NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/annonce', 'legacies_read',  array('SELECT'))
    ->grant('legacies/annonce', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/annonce', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/banned')} (
    `id`                    BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `who`                   BIGINT UNSIGNED     NOT NULL,
    `theme`                 TEXT                NOT NULL,
    `who2`                  BIGINT UNSIGNED     NOT NULL,
    `time`                  TIMESTAMP           NOT NULL,
    `longer`                INT UNSIGNED        NOT NULL    DEFAULT 3600,
    `author`                BIGINT UNSIGNED     NOT NULL,
    `email`                 VARCHAR(100)        NOT NULL,
    KEY `ID` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/banned', 'legacies_read',  array('SELECT'))
    ->grant('legacies/banned', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/banned', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/buddy')} (
    `id`                    BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `sender`                BIGINT UNSIGNED     NOT NULL,
    `owner`                 BIGINT UNSIGNED     NOT NULL,
    `active`                BOOL                NOT NULL    DEFAULT TRUE,
    `text`                  TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/buddy', 'legacies_read',  array('SELECT'))
    ->grant('legacies/buddy', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/buddy', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/chat')} (
    `messageid`             BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `user`                  VARCHAR(255)        NOT NULL,
    `message`               TEXT                NOT NULL,
    `timestamp`             TIMESTAMP           NOT NULL,
    PRIMARY KEY (`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/chat', 'legacies_read',  array('SELECT'))
    ->grant('legacies/chat', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/chat', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/config')} (
    `config_name`           VARCHAR(64)         NOT NULL,
    `config_value`          TEXT                NOT NULL,
    UNIQUE KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/config', 'legacies_read',  array('SELECT'))
    ->grant('legacies/config', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/config', 'legacies_setup')
;

$sql = <<<SQL_EOF
INSERT INTO {$this->getTableName('legacies/config')} (`config_name`, `config_value`) VALUES
    ('users_amount', '5'),
    ('game_speed', '2500'),
    ('fleet_speed', '2500'),
    ('resource_multiplier', '1000'),
    ('Fleet_Cdr', '30'),
    ('Defs_Cdr', '30'),
    ('initial_fields', '5000'),
    ('COOKIE_NAME', 'xnova-legacies'),
    ('game_name', 'XNova:Legacies 2011.1, powered by One.Platform'),
    ('game_disable', '1'),
    ('close_reason', 'Le jeu est clos pour le moment!'),
    ('metal_basic_income', '20'),
    ('crystal_basic_income', '10'),
    ('deuterium_basic_income', '0'),
    ('energy_basic_income', '0'),
    ('BuildLabWhileRun', '0'),
    ('LastSettedGalaxyPos', '1'),
    ('LastSettedSystemPos', '1'),
    ('LastSettedPlanetPos', '1'),
    ('urlaubs_modus_erz', '1'),
    ('noobprotection', '1'),
    ('noobprotectiontime', '5000'),
    ('noobprotectionmulti', '5'),
    ('forum_url', 'http://board.xnova-ng.org/'),
    ('OverviewNewsFrame', '1'),
    ('OverviewNewsTEXT', 'Bienvenue sur le nouveau serveur XNova Legacies'),
    ('OverviewExternChat', '0'),
    ('OverviewExternChatCmd', ''),
    ('OverviewBanner', '0'),
    ('OverviewClickBanner', ''),
    ('ExtCopyFrame', '0'),
    ('ExtCopyOwner', ''),
    ('ExtCopyFunct', ''),
    ('ForumBannerFrame', '0'),
    ('stat_settings', '1000'),
    ('link_enable', '0'),
    ('link_name', ''),
    ('link_url', ''),
    ('enable_announces', '1'),
    ('enable_marchand', '1'),
    ('enable_notes', '1'),
    ('bot_name', 'XNoviana Reali'),
    ('bot_adress', 'xnova@xnova.fr'),
    ('banner_source_post', '../images/bann.png'),
    ('ban_duration', '30'),
    ('enable_bot', '0'),
    ('enable_bbcode', '1'),
    ('debug', '0');
SQL_EOF;

$this->query($sql);

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/declared')} (
    `declarator`            TEXT                NOT NULL,
    `declared_1`            TEXT                NOT NULL,
    `declared_2`            TEXT                NOT NULL,
    `declared_3`            TEXT                NOT NULL,
    `reason`                TEXT                NOT NULL,
    `declarator_name`       TEXT                NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/declared', 'legacies_read',  array('SELECT'))
    ->grant('legacies/declared', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/declared', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/errors')} (
    `error_id`              BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `error_sender`          VARCHAR(32)         NOT NULL,
    `error_time`            TIMESTAMP           NOT NULL,
    `error_type`            VARCHAR(32)         NOT NULL    DEFAULT 'unknown',
    `error_text`            TEXT,
    PRIMARY KEY (`error_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/errors', 'legacies_read',  array('SELECT'))
    ->grant('legacies/errors', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/errors', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/fleets')} (
    `fleet_id`                  BIGINT UNSIGNED     NOT NULL    AUTO_INCREMENT,
    `fleet_owner`               BIGINT UNSIGNED     NOT NULL,
    `fleet_mission`             TINYINT UNSIGNED    NOT NULL,
    `fleet_amount`              DECIMAL(65,0)       NOT NULL,
    `fleet_array`               TEXT                NULL,
    `fleet_start_time`          TIMESTAMP           NOT NULL,
    `fleet_start_galaxy`        TINYINT UNSIGNED    NOT NULL,
    `fleet_start_system`        SMALLINT UNSIGNED   NOT NULL,
    `fleet_start_planet`        TINYINT UNSIGNED    NOT NULL,
    `fleet_start_type`          TINYINT UNSIGNED    NOT NULL,
    `fleet_end_time`            TIMESTAMP           NOT NULL,
    `fleet_end_stay`            TIMESTAMP           NOT NULL,
    `fleet_end_galaxy`          TINYINT UNSIGNED    NOT NULL,
    `fleet_end_system`          SMALLINT UNSIGNED   NOT NULL,
    `fleet_end_planet`          TINYINT UNSIGNED    NOT NULL,
    `fleet_end_type`            TINYINT UNSIGNED    NOT NULL,
    `fleet_taget_owner`         BIGINT UNSIGNED     NOT NULL,
    `fleet_resource_metal`      DECIMAL(65,0)       NOT NULL    DEFAULT 0,
    `fleet_resource_crystal`    DECIMAL(65,0)       NOT NULL    DEFAULT 0,
    `fleet_resource_deuterium`  DECIMAL(65,0)       NOT NULL    DEFAULT 0,
    `fleet_target_owner`        BIGINT UNSIGNED     NOT NULL,
    `fleet_group`               BIGINT UNSIGNED     NOT NULL,
    `fleet_mess`                BIGINT UNSIGNED     NOT NULL,
    `start_time` INT,
    PRIMARY KEY (`fleet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/fleets', 'legacies_read',  array('SELECT'))
    ->grant('legacies/fleets', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/fleets', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/galaxy')} (
    `galaxy`                TINYINT UNSIGNED    NOT NULL,
    `system`                SMALLINT UNSIGNED   NOT NULL,
    `planet`                TINYINT UNSIGNED    NOT NULL,
    `id_planet`             BIGINT UNSIGNED     NOT NULL,
    `metal`                 DECIMAL(65,0)       NOT NULL    DEFAULT 0,
    `crystal`               DECIMAL(65,0)       NOT NULL    DEFAULT 0,
    `id_luna`               BIGINT UNSIGNED     NULL,
    `luna`                  BOOL                NOT NULL    DEFAULT FALSE,
    PRIMARY KEY (`galaxy`, `system`, `planet`),
    KEY `galaxy` (`galaxy`),
    KEY `system` (`system`),
KEY `planet` (`planet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/galaxy', 'legacies_read',  array('SELECT'))
    ->grant('legacies/galaxy', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/galaxy', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/iraks')} (
    `id`                    BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `zeit`                  TIMESTAMP               NOT NULL,
    `galaxy`                TINYINT UNSIGNED        NOT NULL,
    `system`                SMALLINT UNSIGNED       NOT NULL,
    `planet`                TINYINT UNSIGNED        NOT NULL,
    `galaxy_angreifer`      TINYINT UNSIGNED        NOT NULL,
    `system_angreifer`      SMALLINT UNSIGNED       NOT NULL,
    `planet_angreifer`      TINYINT UNSIGNED        NOT NULL,
    `owner`                 BIGINT UNSIGNED         NOT NULL,
    `zielid`                BIGINT UNSIGNED         NOT NULL,
    `anzahl`                SMALLINT UNSIGNED       NOT NULL    DEFAULT 0,
    `primaer`               SMALLINT UNSIGNED,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/iraks', 'legacies_read',  array('SELECT'))
    ->grant('legacies/iraks', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/iraks', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/lunas')} (
    `id`                    BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `id_luna`               BIGINT UNSIGNED         NOT NULL,
    `name`                  VARCHAR(100)            NOT NULL    DEFAULT 'Lune',
    `image`                 VARCHAR(50)             NOT NULL    DEFAULT 'mond',
    `destruyed`             BOOL                    NOT NULL    DEFAULT FALSE,
    `id_owner`              BIGINT UNSIGNED         NOT NULL,
    `galaxy`                TINYINT UNSIGNED        NOT NULL,
    `system`                SMALLINT UNSIGNED       NOT NULL,
    `lunapos`               TINYINT UNSIGNED        NOT NULL,
    `temp_min`              TINYINT                 NOT NULL    DEFAULT 0,
    `temp_max`              TINYINT                 NOT NULL    DEFAULT 0,
    `diameter`              INT UNSIGNED            NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/lunas', 'legacies_read',  array('SELECT'))
    ->grant('legacies/lunas', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/lunas', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/messages')} (
    `message_id`            BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `message_owner`         BIGINT UNSIGNED         NOT NULL,
    `message_sender`        BIGINT UNSIGNED         NOT NULL,
    `message_time`          TIMESTAMP               NOT NULL,
    `message_type`          TINYINT UNSIGNED        NOT NULL,
    `message_from`          VARCHAR(50),
    `message_subject`       VARCHAR(150),
    `message_text`          TEXT,
    PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/messages', 'legacies_read',  array('SELECT'))
    ->grant('legacies/messages', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/messages', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/multi')} (
    `id`                    BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `player`                BIGINT UNSIGNED         NOT NULL,
    `sharer`                BIGINT UNSIGNED         NOT NULL,
    `reason`                TEXT                    NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/multi', 'legacies_read',  array('SELECT'))
    ->grant('legacies/multi', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/multi', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/notes')} (
    `id`                    BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `owner`                 BIGINT UNSIGNED         NOT NULL,
    `time`                  TIMESTAMP               NOT NULL,
    `priority`              TINYINT UNSIGNED        NOT NULL,
    `title`                 VARCHAR(32)             NOT NULL,
    `TEXT`                  TEXT                    NOT NULL    DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/notes', 'legacies_read',  array('SELECT'))
    ->grant('legacies/notes', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/notes', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/planets')} (
    `id`                            BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `name`                          VARCHAR(100)            NOT NULL,
    `id_owner`                      BIGINT UNSIGNED         NOT NULL,
    `id_level`                      TINYINT UNSIGNED        NOT NULL,
    `galaxy`                        TINYINT UNSIGNED        NOT NULL,
    `system`                        SMALLINT UNSIGNED       NOT NULL,
    `planet`                        TINYINT UNSIGNED        NOT NULL,
    `last_update`                   TIMESTAMP               NOT NULL,
    `planet_type`                   TINYINT UNSIGNED        NOT NULL,
    `destruyed`                     BOOL                    NOT NULL    DEFAULT FALSE,
    `b_building`                    SMALLINT UNSIGNED       NOT NULL,
    `b_building_id`                 TEXT                    NOT NULL,
    `b_tech`                        SMALLINT UNSIGNED       NOT NULL,
    `b_tech_id`                     SMALLINT UNSIGNED       NOT NULL,
    `b_hangar`                      SMALLINT UNSIGNED       NOT NULL,
    `b_hangar_id`                   TEXT                    NOT NULL,
    `b_hangar_plus`                 SMALLINT UNSIGNED       NOT NULL,
    `image`                         VARCHAR(50)             NOT NULL    DEFAULT 'normaltempplanet01',
    `diameter`                      INT UNSIGNED            NOT NULL    DEFAULT 12800,
    `points`                        DECIMAL(65,0)           NOT NULL,
    `ranks`                         BIGINT UNSIGNED         NOT NULL,
    `field_current`                 INT UNSIGNED            NOT NULL,
    `field_max`                     INT UNSIGNED            NOT NULL    DEFAULT 163,
    `temp_min`                      INT                     NOT NULL    DEFAULT 0,
    `temp_max`                      INT                     NOT NULL    DEFAULT 0,
    `metal`                         DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `metal_perhour`                 DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `metal_max`                     DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `crystal`                       DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `crystal_perhour`               DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `crystal_max`                   DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `deuterium`                     DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `deuterium_perhour`             DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `deuterium_max`                 DECIMAL(65,0)           NOT NULL    DEFAULT 0,
    `energy_used`                   DECIMAL(65,0)           NOT NULL,
    `energy_max`                    DECIMAL(65,0)           NOT NULL,
    `metal_mine`                    SMALLINT UNSIGNED       NOT NULL,
    `crystal_mine`                  SMALLINT UNSIGNED       NOT NULL,
    `deuterium_sintetizer`          SMALLINT UNSIGNED       NOT NULL,
    `solar_plant`                   SMALLINT UNSIGNED       NOT NULL,
    `fusion_plant`                  SMALLINT UNSIGNED       NOT NULL,
    `robot_factory`                 SMALLINT UNSIGNED       NOT NULL,
    `nano_factory`                  SMALLINT UNSIGNED       NOT NULL,
    `hangar`                        SMALLINT UNSIGNED       NOT NULL,
    `metal_store`                   SMALLINT UNSIGNED       NOT NULL,
    `crystal_store`                 SMALLINT UNSIGNED       NOT NULL,
    `deuterium_store`               SMALLINT UNSIGNED       NOT NULL,
    `laboratory`                    SMALLINT UNSIGNED       NOT NULL,
    `terraformer`                   SMALLINT UNSIGNED       NOT NULL,
    `ally_deposit`                  SMALLINT UNSIGNED       NOT NULL,
    `silo`                          SMALLINT UNSIGNED       NOT NULL,
    `mondbasis`                     SMALLINT UNSIGNED       NOT NULL,
    `phalanx`                       SMALLINT UNSIGNED       NOT NULL,
    `sprungtor`                     SMALLINT UNSIGNED       NOT NULL,
    `small_ship_cargo`              DECIMAL(65,0)           NOT NULL,
    `big_ship_cargo`                DECIMAL(65,0)           NOT NULL,
    `light_hunter`                  DECIMAL(65,0)           NOT NULL,
    `heavy_hunter`                  DECIMAL(65,0)           NOT NULL,
    `crusher`                       DECIMAL(65,0)           NOT NULL,
    `battle_ship`                   DECIMAL(65,0)           NOT NULL,
    `colonizer`                     DECIMAL(65,0)           NOT NULL,
    `recycler`                      DECIMAL(65,0)           NOT NULL,
    `spy_sonde`                     DECIMAL(65,0)           NOT NULL,
    `bomber_ship`                   DECIMAL(65,0)           NOT NULL,
    `solar_satelit`                 DECIMAL(65,0)           NOT NULL,
    `destructor`                    DECIMAL(65,0)           NOT NULL,
    `dearth_star`                   DECIMAL(65,0)           NOT NULL,
    `battleship`                    DECIMAL(65,0)           NOT NULL,
    `misil_launcher`                DECIMAL(65,0)           NOT NULL,
    `small_laser`                   DECIMAL(65,0)           NOT NULL,
    `big_laser`                     DECIMAL(65,0)           NOT NULL,
    `gauss_canyon`                  DECIMAL(65,0)           NOT NULL,
    `ionic_canyon`                  DECIMAL(65,0)           NOT NULL,
    `buster_canyon`                 DECIMAL(65,0)           NOT NULL,
    `small_protection_shield`       ENUM('0','1')           NOT NULL,
    `big_protection_shield`         ENUM('0','1')           NOT NULL,
    `interceptor_misil`             SMALLINT                NOT NULL,
    `interplanetary_misil`          SMALLINT                NOT NULL,
    `metal_mine_porcent`            TINYINT                 NOT NULL    DEFAULT 10,
    `crystal_mine_porcent`          TINYINT                 NOT NULL    DEFAULT 10,
    `deuterium_sintetizer_porcent`  TINYINT                 NOT NULL    DEFAULT 10,
    `solar_plant_porcent`           TINYINT                 NOT NULL    DEFAULT 10,
    `fusion_plant_porcent`          TINYINT                 NOT NULL    DEFAULT 10,
    `solar_satelit_porcent`         TINYINT                 NOT NULL    DEFAULT 10,
    `last_jump_time`                TIMESTAMP               NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/planets', 'legacies_read',  array('SELECT'))
    ->grant('legacies/planets', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/planets', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/rw')} (
    `id_owner1`             BIGINT UNSIGNED         NOT NULL,
    `id_owner2`             BIGINT UNSIGNED         NOT NULL,
    `rid`                   VARCHAR(72)             NOT NULL,
    `raport`                LONGTEXT                NOT NULL,
    `a_zestrzelona`         TINYINT UNSIGNED        NOT NULL,
    `time`                  TIMESTAMP               NOT NULL,
    KEY (`rid`),
    UNIQUE KEY `id_owner1` (`id_owner1`,`rid`),
    UNIQUE KEY `id_owner2` (`id_owner2`,`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/rw', 'legacies_read',  array('SELECT'))
    ->grant('legacies/rw', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/rw', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/statpoints')} (
    `id_owner`              BIGINT UNSIGNED         NOT NULL,
    `id_ally`               BIGINT UNSIGNED         NOT NULL,
    `stat_type`             TINYINT UNSIGNED        NOT NULL,
    `stat_code`             TINYINT UNSIGNED        NOT NULL,
    `tech_rank`             BIGINT UNSIGNED         NOT NULL,
    `tech_old_rank`         BIGINT UNSIGNED         NOT NULL,
    `tech_points`           DECIMAL(65,0)           NOT NULL,
    `tech_count`            BIGINT UNSIGNED         NOT NULL,
    `build_rank`            BIGINT UNSIGNED         NOT NULL,
    `build_old_rank`        BIGINT UNSIGNED         NOT NULL,
    `build_points`          DECIMAL(65,0)           NOT NULL,
    `build_count`           BIGINT UNSIGNED         NOT NULL,
    `defs_rank`             BIGINT UNSIGNED         NOT NULL,
    `defs_old_rank`         BIGINT UNSIGNED         NOT NULL,
    `defs_points`           DECIMAL(65,0)           NOT NULL,
    `defs_count`            BIGINT UNSIGNED         NOT NULL,
    `fleet_rank`            BIGINT UNSIGNED         NOT NULL,
    `fleet_old_rank`        BIGINT UNSIGNED         NOT NULL,
    `fleet_points`          DECIMAL(65,0)           NOT NULL,
    `fleet_count`           BIGINT UNSIGNED         NOT NULL,
    `total_rank`            BIGINT UNSIGNED         NOT NULL,
    `total_old_rank`        BIGINT UNSIGNED         NOT NULL,
    `total_points`          DECIMAL(65,0)           NOT NULL,
    `total_count`           BIGINT UNSIGNED         NOT NULL,
    `stat_date`             TIMESTAMP               NOT NULL,
    KEY (`tech_points`),
    KEY (`build_points`),
    KEY (`defs_points`),
    KEY (`fleet_points`),
    KEY (`total_points`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/statpoints', 'legacies_read',  array('SELECT'))
    ->grant('legacies/statpoints', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/statpoints', 'legacies_setup')
;

$sql = <<<SQL_EOF
CREATE TABLE IF NOT EXISTS {$this->getTableName('legacies/users')} (
    `id`                        BIGINT UNSIGNED         NOT NULL    AUTO_INCREMENT,
    `username`                  VARCHAR(100)            NOT NULL,                   -- FIXME
    `password`                  VARCHAR(64)             NOT NULL,                   -- FIXME
    `email`                     VARCHAR(200)            NOT NULL,                   -- FIXME
    `email_2`                   VARCHAR(200)            NOT NULL,                   -- FIXME
    `lang`                      VARCHAR(3)              NOT NULL    DEFAULT 'fr',
    `authlevel`                 TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `sex`                       ENUM('M','F')           NULL        DEFAULT NULL,
    `avatar`                    VARCHAR(255)            NULL        DEFAULT NULL,
    `sign`                      TEXT                    NULL,
    `id_planet`                 BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `galaxy`                    TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `system`                    SMALLINT UNSIGNED       NOT NULL,                   -- FIXME
    `planet`                    TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `current_planet`            BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `user_lastip`               VARCHAR(16)             NOT NULL,                   -- FIXME
    `ip_at_reg`                 VARCHAR(16)             NOT NULL,                   -- FIXME
    `user_agent`                TEXT                    NOT NULL,                   -- FIXME
    `current_page`              TEXT                    NOT NULL,                   -- FIXME
    `register_time`             TIMESTAMP               NOT NULL,                   -- FIXME
    `onlinetime`                TIMESTAMP               NOT NULL,                   -- FIXME
    `dpath`                     VARCHAR(255)            NOT NULL,                   -- FIXME
    `design`                    TINYINT                 NOT NULL    DEFAULT 1,      -- FIXME
    `noipcheck`                 BOOL                    NOT NULL    DEFAULT TRUE,   -- FIXME
    `planet_sort`               TINYINT                 NOT NULL    DEFAULT 0,      -- FIXME
    `planet_sort_order`         TINYINT                 NOT NULL    DEFAULT 0,      -- FIXME
    `spio_anz`                  TINYINT UNSIGNED        NOT NULL    DEFAULT 1,      -- FIXME
    `settings_tooltiptime`      TINYINT UNSIGNED        NOT NULL    DEFAULT 5,      -- FIXME
    `settings_fleetactions`     TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `settings_allylogo`         TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `settings_esp`              TINYINT UNSIGNED        NOT NULL    DEFAULT 1,      -- FIXME
    `settings_wri`              TINYINT UNSIGNED        NOT NULL    DEFAULT 1,      -- FIXME
    `settings_bud`              TINYINT UNSIGNED        NOT NULL    DEFAULT 1,      -- FIXME
    `settings_mis`              TINYINT UNSIGNED        NOT NULL    DEFAULT 1,      -- FIXME
    `settings_rep`              TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `urlaubs_modus`             TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `urlaubs_until`             TIMESTAMP               NOT NULL,                   -- FIXME
    `db_deaktjava`              BOOL                    NOT NULL    DEFAULT FALSE,  -- FIXME
    `new_message`               TINYINT UNSIGNED        NOT NULL    DEFAULT 0,      -- FIXME
    `fleet_shortcut`            TEXT                    NULL,
    `b_tech_planet`             INT                     NOT NULL,                   -- FIXME
    `spy_tech`                  TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `computer_tech`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `military_tech`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `defence_tech`              TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `shield_tech`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `energy_tech`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `hyperspace_tech`           TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `combustion_tech`           TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `impulse_motor_tech`        TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `hyperspace_motor_tech`     TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `laser_tech`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `ionic_tech`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `buster_tech`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `intergalactic_tech`        TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `expedition_tech`           TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `graviton_tech`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `ally_id`                   BIGINT UNSIGNED         NOT NULL,
    `ally_name`                 VARCHAR(32)             NULL,                       -- FIXME
    `ally_request`              BOOL                    NOT NULL    DEFAULT FALSE,  -- FIXME
    `ally_request_text`         TEXT                    NULL,                       -- FIXME
    `ally_register_time`        TIMESTAMP               NOT NULL,                   -- FIXME
    `ally_rank_id`              BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `current_luna`              INT                     NOT NULL,                   -- FIXME
    `kolorminus`                VARCHAR(11)             NOT NULL DEFAULT 'red',
    `kolorplus`                 VARCHAR(11)             NOT NULL DEFAULT '#00FF00',
    `kolorpoziom`               VARCHAR(11)             NOT NULL DEFAULT 'yellow',
    `rpg_geologue`              TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_amiral`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_ingenieur`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_technocrate`           TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_espion`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_constructeur`          TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_scientifique`          TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_commandant`            TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_points`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_stockeur`              TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_defenseur`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_destructeur`           TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_general`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_bunker`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_raideur`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `rpg_empereur`              TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `lvl_minier`                BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `lvl_raid`                  BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `xpraid`                    BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `xpminier`                  BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `raids`                     BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `p_infligees`               DECIMAL(65,0)           NOT NULL,                   -- FIXME
    `mnl_alliance`              TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_joueur`                TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_attaque`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_spy`                   TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_exploit`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_transport`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_expedition`            TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_general`               TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `mnl_buildlist`             TINYINT UNSIGNED        NOT NULL,                   -- FIXME
    `bana`                      BOOL                    NOT NULL    DEFAULT FALSE,  -- FIXME
    `multi_validated`           BOOL                    NOT NULL    DEFAULT FALSE,  -- FIXME
    `banaday`                   TIMESTAMP               NULL        DEFAULT NULL,   -- FIXME
    `raids1`                    BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `raidswin`                  BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    `raidsloose`                BIGINT UNSIGNED         NOT NULL,                   -- FIXME
    PRIMARY KEY (`id`),
    UNIQUE KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL_EOF;

$this->query($sql);

$this
    ->grant('legacies/users', 'legacies_read',  array('SELECT'))
    ->grant('legacies/users', 'legacies_write', array('SELECT', 'CREATE', 'UPDATE', 'DELETE'))
    ->grant('legacies/users', 'legacies_setup')
;

$sql = <<<SQL_EOF
INSERT INTO {$this->getTableName('legacies/users')} (
    `id`, `username`, `password`, `email`, `email_2`, `lang`, `authlevel`, `sex`,
    `avatar`, `sign`, `id_planet`, `galaxy`, `system`, `planet`, `current_planet`,
    `user_lastip`, `ip_at_reg`, `user_agent`, `current_page`, `register_time`,
    `onlinetime`, `dpath`, `design`, `noipcheck`, `planet_sort`, `planet_sort_order`,
    `spio_anz`, `settings_tooltiptime`, `settings_fleetactions`, `settings_allylogo`,
    `settings_esp`, `settings_wri`, `settings_bud`, `settings_mis`, `settings_rep`,
    `urlaubs_modus`, `urlaubs_until`, `db_deaktjava`, `new_message`, `fleet_shortcut`,
    `b_tech_planet`, `spy_tech`, `computer_tech`, `military_tech`, `defence_tech`,
    `shield_tech`, `energy_tech`, `hyperspace_tech`, `combustion_tech`,
    `impulse_motor_tech`, `hyperspace_motor_tech`, `laser_tech`, `ionic_tech`,
    `buster_tech`, `intergalactic_tech`, `expedition_tech`, `graviton_tech`,
    `ally_id`, `ally_name`, `ally_request`, `ally_request_text`, `ally_register_time`,
    `ally_rank_id`, `current_luna`, `kolorminus`, `kolorplus`, `kolorpoziom`,
    `rpg_geologue`, `rpg_amiral`, `rpg_ingenieur`, `rpg_technocrate`, `rpg_espion`,
    `rpg_constructeur`, `rpg_scientifique`, `rpg_commandant`, `rpg_points`, `rpg_stockeur`,
    `rpg_defenseur`, `rpg_destructeur`, `rpg_general`, `rpg_bunker`, `rpg_raideur`,
    `rpg_empereur`, `lvl_minier`, `lvl_raid`, `xpraid`, `xpminier`, `raids`,
    `p_infligees`, `mnl_alliance`, `mnl_joueur`, `mnl_attaque`, `mnl_spy`,
    `mnl_exploit`, `mnl_transport`, `mnl_expedition`, `mnl_general`, `mnl_buildlist`,
    `bana`, `multi_validated`, `banaday`, `raids1`, `raidswin`, `raidsloose`
    )
    VALUES
    ('1', 'Admin', '', '', '', 'fr_FR', '3', NULL, '', '', '1', '1', '1', '1',
    '1', '127.0.0.1', '', '', '', '1254743313', '1269391977', '', '1', '1', '0',
    '0', '1', '5', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', '', '0',
    '16', '20', '11', '11', '11', '12', '10', '14', '10', '9', '0', '0', '0', '0',
    '0', '1', '0', '', '0', '', '0', '0', '0', 'red', '#00FF00', 'yellow', '20',
    '20', '10', '10', '0', '3', '3', '0', '27', '2', '2', '0', '0', '0', '0', '0',
    '98', '1', '0', '1133583738', '0', '0', '0', '0', '0', '0', '0', '0', '0',
    '0', '0', '0', '0', '0', '0', '0', '0')
SQL_EOF;
