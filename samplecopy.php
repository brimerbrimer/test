<!DOCTYPE html>
<html>
<head>
    <title>Wheels4Meals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" rel="stylesheet">
    <link href="styles/main.css?1" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<div data-role="page">
 
    <div data-role="header" data-position="fixed">
        <?php include("includes/header.php"); ?>
    </div>

    <div role="main" class="ui-content">

        <h1>Wheels4Meals Test Page</h1>
        <h2>DB Connection</h2>

        <?php require_once('connection.php'); ?>

        <?php
        $db = DB::getInstance();

        echo '<div class="location_id' . (isset($db) ? '' : ' bad') . '">DB Connection: ' . (isset($db) ? 'GOOD!' : 'bad') . '</div><br/>' . "\n\n";

        //$proc = 'GetMemberTypes';
        $sql = "SELECT MemberTypeID, Name FROM WM_MemberType";
        $dataset = $db->query($sql);
        $dataset->setFetchMode(PDO::FETCH_ASSOC);
        // $stmt->execute();
        // "CALL GetCustomers()"
        //$stmt = $dbh->prepare ("INSERT INTO user (firstname, surname) VALUES (:fname, :sname)");
        //$stmt -> bindParam(':fname', 'John');
        //$stmt -> bindParam(':sname', 'Smith');
        //$stmt -> execute();
        ?>

        <p style="font-size: 20px; border: 2px solid #BB7722; border-radius: 8px; padding: 8px; margin-top: 32px; width: 80%;">
            This page references jQuery Mobile now, which provides a responsive design and mobile-friendly controls.
            Notice that the main content scrolls but the header and footer stay in place.
        </p>

        <p>
            Below are some sample controls that are rendered differently because of JQMobile. If you look at the source code, they're just plain HTML &lt;SELECT&gt; tags.
        </p>

        <?php if ($dataset->fetchColumn() > 0) { ?>
            <div class="ui-field-contain">
                <label for="memberType" style="white-space: nowrap;">Member Type:</label>

                <select id="memberType" name="memberType" data-native-menu="false" data-inline="false">
                    <option value="0" data-placeholder="true"></option>

                    <?php while ($row = $dataset->fetch()): ?>
                        <option value="<?php echo $row["MemberTypeID"]; ?>"><?php echo $row["Name"]; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        <?php
        }

        $sql = "SELECT CellCarrierID, Name FROM WM_CellCarrier";
        $dataset = $db->query($sql);
        ?>

        <?php if ($dataset->fetchColumn() > 0) { ?>
            <div class="ui-field-contain">
                <label for="CellCarrier" style="white-space: nowrap;">Cell Carrier:</label>

                <select id="CellCarrier" name="CellCarrier" data-native-menu="false" data-inline="false">
                    <option value="0" data-placeholder="true"></option>

                    <?php while ($row = $dataset->fetch()): ?>
                        <option value="<?php echo $row["CellCarrierID"]; ?>"><?php echo $row["Name"]; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <!-- <ul id="CellCarrier" name="CellCarrier"> -->

            <?php while ($row = $dataset->fetch()): ?>
                <!-- <li><?php echo $row["CellCarrierID"] . " = " . $row["Name"]; ?></li> -->
            <?php endwhile; ?>
                
            <!-- </ul> -->
        <?php
        }

        $dataset = null;
        $db = null;
        ?>

    </div><!-- /content -->

    <div data-role="footer" data-position="fixed">
        <?php include("includes/footer.php"); ?>
    </div>

</div><!-- /page -->


</body>
</html>