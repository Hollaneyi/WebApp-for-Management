
PHPBuilder.com - Powered by vBulletin


    Register
    Help

    Remember Me?

    Forum
        New Posts
        FAQ
        Calendar
        Forum Actions
        Quick Links
    What's New?

    Advanced Search

    Home
    Forum
    PHP Help
    Newbies
    Accessing multiple arrays with one foreach loop

    If this is your first visit, be sure to check out the FAQ by clicking the link above. You may have to register before you can post: click the register link above to proceed. To start viewing messages, select the forum that you want to visit from the selection below.

Results 1 to 6 of 6
Thread: Accessing multiple arrays with one foreach loop
inShare

    Thread Tools
    Search Thread
    Display

    01-18-2006, 03:53 PM #1
    PHPSardine
    PHPSardine is offline
    Member

    Join Date
        Jan 2006
    Posts
        32

    Accessing multiple arrays with one foreach loop

        Hi...I'm new here and new to PHP, so play nice!

        I have a simple form that sends up to 30 sets of 4 inputs. I.E. these inputs can be set up to 30 times:

        Code:

        <form action="insert_gig.php" method="post" target="_blank">
        <select name="setnum[]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>

        <select name="song[]">
        <option value="1" size="10">100 Rockets</option>
        <option value="2" size="10">101st Lament</option>
        <option value="3" size="10">1776</option>
        <option value="4" size="10">66 Sleepers To Summer</option>
        </select>

        <select name="style[]">
        <option value="1">Album/Studio</option>
        <option value="2">Single</option>
        <option value="3">Demo</option>
        <option value="4">Acoustic</option>
        <option value="5">Extended Intro</option>
        <option value="6">Extended Outro</option>
        </select>

        <p>Encore:</p>
        <select name="encore[]">
        <option value="N">No</option>
        <option value="Y">Yes</option>
        </select><br/><br/>

        <select name="setnum[]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        </select>

        As you can see I'm puling each in as an array. I can get each array to print out in its own as such:

        Code:

        foreach($_POST['song'] as $value1){
        	echo "<p>Song: $value1</p><br/>\n";
        }

        foreach($_POST['setnum'] as $value2){
        	echo "<p>Song Number: $value2</p><br/>\n";
        }

        foreach($_POST['style'] as $value3){
        	echo "<p>Song Style: $value3</p><br/>\n";
        }

        foreach($_POST['encore'] as $value4){
        	echo "<p>Encore: $value4</p><br/>\n";
        }

        However, I am attemping to access each array with one loop so I can insert the values in an SQL statement that will run up to 30 times.

        I would like to insert it into the following:

        Code:

        $query = "INSERT INTO `setlist` ( `setlist_id` , `gig_id` , `venue_id` , `setlist_number` , `track_id` , `song_style_id` , `encore` )
        VALUES ('', '$gig', '$venue', '$val2', '$val1.', '$val3', '$val4')";

        So how can I get it so I can loop through all of the arrays simultaneously so that the first loop through of the query pulls in the first values of each array, the second loop through the query pulls in the second values of the arrays, etc.

        Thank you so much for the help!

    Reply With Quote Reply With Quote Share on Google+
    01-18-2006, 04:20 PM #2
    devinemke
    devinemke is offline
    chocoholic (with alcohol)
    devinemke's Avatar

    Join Date
        Aug 2002
    Location
        NYC
    Posts
        5,158

        i suggest you structure/group the incoming data differently. here is a simple exmaple:
        PHP Code:
        <?php
        if (!isset($_POST['submit']))
        {
            $setnum = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9
            );

            $song = array(
            1 => '100 Rockets',
            2 => '101st Lament',
            3 => '1776',
            4 => '66 Sleepers To Summer'
            );

            $style = array(
            1 => 'Album/Studio',
            2 => 'Single',
            3 => 'Demo',
            4 => 'Acoustic',
            5 => 'Extended Intro',
            6 => 'Extended Outro'
            );

            $encore = array(
            'N' => 'No',
            'Y' => 'Yes'
            );

            $data = array(
            'setnum' => $setnum,
            'song' => $song,
            'style' => $style,
            'encore' => $encore
            );

            echo '<form action="" method="post">';
            for ($i = 1; $i <= 3; $i++)
            {
                echo 'group #' . $i . '<br><br>';
                foreach ($data as $key => $value)
                {
                    echo $key . ': <select name="data[' . $i . '][' . $key . ']">';
                    foreach ($value as $subkey => $subvalue)
                    {
                        echo '<option value="' . $subkey . '">' . $subvalue . '</option>';
                    }
                    echo '</select><br>';
                }
                echo '<hr>';
            }
            echo '
            <input type="submit" name="submit" value="submit">
            </form>
            ';
        }
        else
        {
            foreach ($_POST['data'] as $key => $value)
            {
                extract($value);
                $sql = "INSERT INTO setlist SET setnum = '$setnum', song = '$song', style = '$style', encore = '$encore'";
                echo $sql . '<br>';
            }
        }
        ?>

    Reply With Quote Reply With Quote Share on Google+
    01-18-2006, 05:18 PM #3
    PHPSardine
    PHPSardine is offline
    Member

    Join Date
        Jan 2006
    Posts
        32

        You legend!!! I'll give this a try and see if it works, else I might need some more help. Thanks anyway!

    Reply With Quote Reply With Quote Share on Google+
    01-18-2006, 06:36 PM #4
    PHPSardine
    PHPSardine is offline
    Member

    Join Date
        Jan 2006
    Posts
        32

        ...just thought I'd say thanks...I got it work. I used most of your code, but suplemented with some of mine to dynamically create some of the inputs.

        Anyway...thanks so much. I really appreciate your help and I feel that I learned a great new trick today!

    Reply With Quote Reply With Quote Share on Google+
    05-03-2008, 02:31 PM #5
    gdowkpc
    gdowkpc is offline
    Junior Member

    Join Date
        May 2008
    Posts
        1

        I am working on a similar issue.

        I am creating a search for repeater sites within 25 miles of the Interstate. To do this, I imputted lat/long coordinates every 25 miles. I have a program that parses the coordinates from the database for the chosen Interstate and creates and array. That array is then converted to another array where $lat is broken down in $lat1 and $lat2 (allows for searching between the coordinates for results). The same is done with the longitude. To search multiple states, since Interstates almost run through more than one state and each state is lsited in a different table, there is an array of tables for representing each state.

        I have been trying to use a foreach statement to run the arrays through the query. It seems to work OK looping the tables, lat1 and lat2, but when I plug in longitude, I get "Fatal error: Maximum execution time of 30 seconds exceeded".

        How do I do a foreach on the query 5 times?

        Here is the code:
        Code:

        $query_route =  mysql_query ("SELECT `lat`, `long`
                     FROM interstate WHERE `route` = '$route'")
                     or die (mysql_error());

        $num_rows = mysql_num_rows($query_route);

        $number = number_format($num_rows, 0);

        echo "Parameters: Searching for sites within 25 miles of Interstate $route using $number points.<br><br>";

        while($rowin = mysql_fetch_array($query_route))
        {
        $lat1[] = $rowin[0] - $dlat;
        $lat2[] = $rowin[0] + $dlat;
        $long1[] = $rowin[1] - $dlong;
        $long2[] = $rowin[1] + $dlong;
        }

        $query_first = "SELECT DISTINCT status.`url`, `ID`, `freq`, `pl`,
                     `loc`, counties.`county_name`, ORrpt.`state_id`, `call`,
                     `use`, `offset`
                     FROM `ORrpt`
                     INNER JOIN counties ON ORrpt.county_id = counties.county_id
                     AND ORrpt.state_id = counties.state_id
                     INNER JOIN status ON ORrpt.op_status = status.status_id
                     WHERE (`lat` BETWEEN '$lat1[0]' AND '$lat2[0]'
                     AND `long` BETWEEN '$long1[0]' AND '$long2[0]') AND `op_status` NOT LIKE '4'";


        include 'tables.php'; // array of all enabled tables.
        foreach ($tables as $table) {
        foreach ($lat1 as $lata) {
        foreach ($lat2 as $latb) {
        foreach ($long1 as $longa) {
        foreach ($long2 as $longb) {

        $query_mid[] =  "UNION SELECT DISTINCT status.`url`, $table.`ID`, $table.`freq`, $table.`pl`,
                     $table.`loc`, counties.`county_name`, $table.`state_id`, $table.`call`,
                     $table.`use`, `offset`
                     FROM `$table`
                     INNER JOIN counties ON $table.county_id = counties.county_id
                     AND $table.state_id = counties.state_id
                     INNER JOIN status ON $table.op_status = status.status_id
                     WHERE (`lat` BETWEEN '$lata' AND '$latb'
                     AND `long` BETWEEN '$longa' AND '$longb') AND `op_status` NOT LIKE '4'";

        $query_midF = implode(' ', $query_mid);
        } } } } }
        $query_end = "ORDER BY `freq`, `loc` ASC";
        $query = mysql_query ("$query_first $query_midF $query_end")
        or die (mysql_error());

        // Number of repeaters found message
        $num_rows = mysql_num_rows($query);
        IF ($num_rows == "0") {
        echo mysql_error();

        Last edited by gdowkpc; 05-03-2008 at 02:35 PM.

    Reply With Quote Reply With Quote Share on Google+
    05-03-2008, 03:56 PM #6
    leatherback
    leatherback is offline
    Beware: Crazy Scientist
    leatherback's Avatar

    Join Date
        Mar 2002
    Location
        Small border town between Netherlands and Germany
    Posts
        5,395

        Hm.. in your case I would completely rethink your design. What is the core-reason for having a table for each state? You should really have one table with coordinates, and a colum with states, I think. Also.. It sounds like you are creating a list of 25*25km squares for the whole of the US, and define only one coordinate. You might get better results if for each 25km blck you would define start and end lon and lat. Store them in a table, together with the state their are in. You can now query that table with one simple query, and link all other info through othertables.

        Again: It is not completely clear to me what you are trying to provide, information-wise. But i am 99% sure you need to rethink your database structure. Sorry

        Php 4.* to 5.*. A small step for programmers. But a leap for me!

    Reply With Quote Reply With Quote Share on Google+

Quick Navigation Newbies Top
« Previous Thread | Next Thread »
Thread Information

There are currently 1 users browsing this thread. (0 members and 1 guests)

Posting Permissions

    You may not post new threads
    You may not post replies
    You may not post attachments
    You may not edit your posts


    BB code is On
    Smilies are On
    [IMG] code is Off
    [VIDEO] code is Off
    HTML code is Off

Forum Rules

    Contact Us PHP Builder: manuals, content management systems, scripts, classes and more. Top






All times are GMT -4. The time now is 04:36 PM.
