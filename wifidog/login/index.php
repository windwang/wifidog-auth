<?php
  // $Id$
  /********************************************************************\
   * This program is free software; you can redistribute it and/or    *
   * modify it under the terms of the GNU General Public License as   *
   * published by the Free Software Foundation; either version 2 of   *
   * the License, or (at your option) any later version.              *
   *                                                                  *
   * This program is distributed in the hope that it will be useful,  *
   * but WITHOUT ANY WARRANTY; without even the implied warranty of   *
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the    *
   * GNU General Public License for more details.                     *
   *                                                                  *
   * You should have received a copy of the GNU General Public License*
   * along with this program; if not, contact:                        *
   *                                                                  *
   * Free Software Foundation           Voice:  +1-617-542-5942       *
   * 59 Temple Place - Suite 330        Fax:    +1-617-542-2652       *
   * Boston, MA  02111-1307,  USA       gnu@gnu.org                   *
   *                                                                  *
   \********************************************************************/
  /**@file
   * Login page
   * @author Copyright (C) 2004 Benoit Gr�goire et Philippe April
   */
define('BASEPATH','../');
require_once BASEPATH.'include/common.php';
require_once BASEPATH.'classes/SmartyWifidog.php';
require_once (BASEPATH.'include/user_management_menu.php');

$login_successfull = false;
$login_failed_message = '';
 $previous_username = '';
 $previous_password = '';
//print_r($_REQUEST);
if (isset($_REQUEST['user']) && isset($_REQUEST['pass'])) 
  {
 $previous_username = $_REQUEST['user'];
 $previous_password = $_REQUEST['pass'];
    $user = $db->EscapeString($_REQUEST['user']);
    $password = $db->EscapeString($_REQUEST['pass']);
    $db->ExecSqlUniqueRes("SELECT * FROM users WHERE user_id='$user' && pass=PASSWORD('$password')", $user_info);
    if ($user_info != null)
      {
	$token = gentoken();
	if ($_REQUEST['gw_id']) 
	  {
	    $hotspot_id = $_REQUEST['gw_id'];
	  }
	if ($_SERVER['REMOTE_ADDR'])
	  {
	    $hotspot_ip = $_SERVER['REMOTE_ADDR'];
	  }
	$db->ExecSqlUpdate("INSERT INTO connections (user_id, token, token_status, timestamp_in, hotspot_id, hotspot_ip) VALUES ('{$user_info['user_id']}', '$token', '" . TOKEN_UNUSED . "', NOW(), '$hotspot_id', '$hotspot_ip')");
	
	$login_successfull=true;
	header("Location: http://" . $_REQUEST['gw_address'] . ":" . $_REQUEST['gw_port'] . "/wifidog/auth?token=$token");
      }
    else
      {
	$user_info = null;
        $db->ExecSqlUniqueRes("SELECT * FROM users WHERE user_id='$user'", $user_info, false);
	if($user_info == null)
	  {
	    $login_failed_message = _('Unknown username');
	  }
	else
	  {
	    $login_failed_message = _('Incorrect password');
	  }
      }
  }

if($login_successfull==false)
  {
    $smarty = new SmartyWifidog;
    $smarty->assign("user_management_menu", get_user_management_menu());
    $smarty->assign('previous_username',$previous_username);
    $smarty->assign('previous_password',$previous_password);
    $smarty->assign('login_failed_message',$login_failed_message);
    $smarty->assign('gw_address', $_REQUEST['gw_address']);
    $smarty->assign('gw_port',$_REQUEST['gw_port']);
    $smarty->assign('gw_id',$_REQUEST['gw_id']);
    
    //$user_management_url = BASE_URL_PATH."user_management/";

    $smarty->displayLocalContent(LOGIN_PAGE_NAME);
  }
?>