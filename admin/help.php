<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (c) 2013 Osclass
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
                <legend style="font-size:18px; font-weight:bold;"><?php _e('Cache Plugin Help', 'cacheplugin'); ?></legend>
                 <p>&nbsp;</p>
                <h3>Don't need cron</h3>
                <p>This plugin will work autonomously without any cron, the users will re-generate the cache while browsing on your site.</p>
                <br>
                <h3>Setting cache time</h3>
                <p>The time setting is based on hours, this means that to set one hour you enter 1, to set one day you enter 24, to set one week you enter 168 and so on.<br>You can also set less than one hour, for example if you want 15 minutes you can enter 0.25, 30 minutes 0.5 etc.</p>
                <br>
                <h3>Flexibility on which pages enable the cache</h3>
                <p>The plugin will cache 3 pages (Items Pages - Main Pages - Static Pages). From the settings page of the plugin you can enable/disable the cache in each one of the pages.</p>
                <br>
                <h3>Clean the cache folders</h3>
                <p>You can also delete the files in each one of the folders in the plugin settings. It will show a list with the deleted files if any.</p>
                <br>
                <h3>Storage of items cache</h3>
                <p>The cache of ads is stored in subfolders based on the publication date of the ad</p>
                <br>
                <h3>Setting the items cache</h3>
                <p>From the plugin settings you can choose how the subfolders are created: by year, by month or by day</p>
                <br>
                <h3>Clear the cache in main folder when a new ad is posted</h3>
                <p>From the plugin settings you have the option to enable or disable this feature. Useful if your site has high traffic and many new ads are posted daily</p> 
            </fieldset>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>
