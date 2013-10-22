<?php
    /*
     *      OSCLass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2010 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset>
                <legend style="font-size:18px; font-weight:bold;"><?php _e('Plugin Cache Help', 'plugincache'); ?></legend>
                 <p>&nbsp;</p>
                <h3>Don't need cron</h3>
                <p>This plugin will work autonomously without any cron, the users will re-generate the cache browsing on your site.</p>
                <br/>
                <h3>Setting cache time</h3>
                <p>the time setting is based on hours, this means that to set one hour you enter 1, to set one day you enter 24, to set one week you enter 168 and so on. You can also set less than one hour, for example if you want 15 minutes you can enter 0.25, 30 minutes 0.5 etc.  </p>
                <br/>
                <h3>Flexibility on which pages enable the cache</h3>
                <p>The plugin will make the cache of 4 pages (Items Pages - Search Pages - Main Pages - Static Pages), From the setting page of the plugin you can enable/disable the cache in each one of the pages. </p>
                <br/>
                <h3>Clean the cache folders</h3>
                <p>You can also delete the files in each one of the folders in the plugin setting. It will show a list with de deleted files if any.</p>
                <br/>
                <h3>IMPORTANT</h3>
                <p>When you install the plugin, it will add the folders for the cahe and 4 php files in your root directory (used to delete the cache files from plugin settings).If you don't like the plugin or if is not working for you, make sure to uninstall it, do not simply delete the folder with ftp. Uninstalling the plugin will delete all the added folders and files and leave you site clean.</p>
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>