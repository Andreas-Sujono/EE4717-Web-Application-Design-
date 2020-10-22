<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>JavaJam Coffee House</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="root">
        <header>
            <img 
                src="./headerImage.gif" 
                class="header-image"
            />
        </header>
        <main>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="music.html">Music</a></li>
                    <li><a href="jobs.html">Jobs</a></li>
                    <li class="active"><a href="salesReport.php">Daily Sales Report</a></li>
                </ul>
            </nav>
            <div class="right-column">
                <h1 class="title">Click to generate daily sales report:</h1>
                <table class="sales-report">
                    <tr>
                        <td>
                            <a href="totalSales.php">
                                <div class="menu-checkbox menu-checkbox1"></div>
                            </a>
                        </td>
                        <td>
                            <h2>Total Dollar sales by products</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="salesQuantity.php">
                                <div class="menu-checkbox menu-checkbox1"></div>
                            </a>
                        </td>
                        <td>
                            <h2>Sales quantities by product categories</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <i><small>
                    Copyright &copy; 2014 Javajam Coffee House <br/>
                    <a href="mailto:andreas@sujono.com">andreas@sujono.com</a>
                </small></i>
                
            </div>
        </footer>
    </div>
</body>

</html>
