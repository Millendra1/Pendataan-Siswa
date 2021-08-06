<html>
<head>
	<title>PENCARIAN DATA SISWA</title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}
		h1 {
			color: black;
		}
		table {
			border: 1px solid #ddeeee;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		td {
			border: 1px solid black;
			padding: 20px;
			text-align: left;
		}
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
           }

        li {
            float: left;
         }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
         }
        li a:hover {
            background-color: grey;
        }
        .active {
        background-color: #04AA6D;
        }
        .pasif{
            background-color: black;   
        }
        .pasif:hover{
            background-color: red;   
        }
        th{
            color: white;
            border: 1px solid black;
			padding: 20px;
			text-align: left;
            list-style-type: none;
            overflow: hidden;
            background-color: #2196F3;
           }
        .btn {
            border: none; 
            color: white; 
            padding: 14px 28px;
            cursor: pointer; 
             }
        .buton {
            background-color: #2196F3;
            } 
        .buton:hover {
            background-color: #0b7dda;
            }   
        .cari{
            padding: 11px 50px;
            weight: 50px ;
        }
        .pencarian{
            background-color: black;
            padding: 12px 50px;
            weight: 25px ;
        }
        }
	</style>
</head>
 <body>

<ul>

  <li class=" active">
      <a href="#home">Home</a>
  </li>
  <li>
      <a href="#news">&nbsp;&nbsp;Info&nbsp;&nbsp;</a>
  </li>
  <li style="float:right">
      <a class="pasif" href="#about">Log Out</a>
  </li>

</ul>
	<center><h1>PENCARIAN DATA SISWA</h1></center>
	          <form method="GET" action="index.php" style="text-align: center;">
		    <label >Pencarian : </label>
		  <input class="cari" type="text" name="cari" placeholder="ketikan nama/nis" value="<?php if(isset($_GET['cari'])) { echo $_GET['cari']; } ?>" />
		<button class="btn buton" type="submit">Cari</button>
	</form>
	<table>
		<head>
			<tr>
				<th>No</th>
				  <th>Nama</th>
				  <th>Nis</th>
                <th>TTL</th>
			</tr>
		</head> 
	<body>
<?php 
	
            include('koneksi.php');

				if(isset($_GET['cari'])) {
					$cari = $_GET['cari'];
         			$query = "SELECT * FROM siswa WHERE nama like '%".$cari."%' OR nis like '%".$cari."%' OR ttl like '%".$cari."%' ORDER BY no ASC";
				} else {
					$query = "SELECT * FROM siswa ORDER BY no ASC";
				}
				
				$result = mysqli_query($koneksi, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['no']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['nis']; ?></td>
                <td><?php echo $row['ttl']; ?></td>
			</tr>
			<?php
			}
			?>

		    </body>
	   </table>
    </body>
</html>