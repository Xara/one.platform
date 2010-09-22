<?php
/**
 * This file is part of XNova:Legacies
 *
 * @license http://www.gnu.org/licenses/agpl-3.0.txt
 * @see http://www.xnova-ng.org/
 *
 * Copyright (c) 2009-2010, Grégory PLANCHAT <g.planchat at gmail.com>
 * All rights reserved.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * NOTICE:
 *  This file is part of the core development branch, changing its contents will
 * make you unable to use the automatic updates manager. Please refer to the
 * documentation for further information about customizing XNova.
 *
 */

/**
 * Database connection interface
 *
 * @since 0.1.0
 *
 * @access      public
 * @author      gplanchat
 * @category    Database
 * @package     One_Core
 * @subpackage  One_Core_Dal
 */
interface One_Core_Dal_Database_Connection_AdapterInterface
{
    /**
     * TODO: PHPDoc
     *
     * @since 0.1.0
     */
    public function getConfig();

    /**
     * TODO: PHPDoc
     *
     * @since 0.1.0
     */
    public function getEntitiesConfig();

    /**
     * TODO: PHPDoc
     *
     * @since 0.1.0
     */
    public function getTable($table);

    /**
     * TODO: PHPDoc
     *
     * @since 0.1.0
     */
    public function getDeprecatedTable($table);
}
