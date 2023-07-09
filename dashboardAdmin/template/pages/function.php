<?php 

$koneksi = mysqli_connect('localhost','root','','dengerin');
if (!$koneksi) {
	echo "koneksi gagal";
}

/* ------------------- USER --------------------- */
function insertDataUser($data,$file){
	global $koneksi;
	$username = $data['username'];
	$password = $data['password'];
	$email = $data['email'];
	$image = $file["image"]["name"];
	
	$selectId = mysqli_query($koneksi,"SELECT max(id_user) FROM user");
	$data2 = mysqli_fetch_array($selectId);
	$id = $data2["max(id_user)"]+1;

	$target_dir = "../../assets/images/image-user/";
	$target_file =$target_dir.basename($file["image"]["name"]);
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imageName = 'image_'.$id.'.'.$filetype;
	$target_image =$target_dir.basename($imageName);
	$sizeFile = $file["image"]["size"];

	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_image)) {
				$query = mysqli_query($koneksi,"INSERT INTO user VALUES 
					('','$username','$password','$email','$imageName','user')");
			}else{
				echo "gagal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
	return mysqli_affected_rows($koneksi);
}
function updateDataUser($data,$file){
	global $koneksi;
	$id = $data['id'];
	$username = $data['usernameUpdate'];
	$password = $data['passwordUpdate'];
	$email = $data['emailUpdate'];
	$image = $file["imageUpdate"]["name"];
	if (empty($image)) { 
		$query = mysqli_query($koneksi,"UPDATE user SET 
			id_user = '$id',
			username = '$username',
			password = '$password',
			email = '$email' WHERE id_user = '$id' ");
	}else{
		$target_dir = "../../assets/images/image-user/";
		$target_file =$target_dir.basename($file["imageUpdate"]["name"]);
		$sizeFile = $file["imageUpdate"]["size"];

		$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
			echo "<br>masukan file  : jpg,png,jpeg";
		}else{
			if ($sizeFile <= 500000) {
				if (move_uploaded_file($_FILES["imageUpdate"]["tmp_name"],$target_file)) {
					$query = mysqli_query($koneksi,"UPDATE user SET 
						id_user = '$id',
						username = '$username',
						password = '$password',
						email = '$email',
						image = '$image' WHERE id_user = '$id' ");
				}else{
					echo "galgal";
				}
			}else{
				echo "<br> File Kegeedan : ", $sizeFile;
			}
		}
	}

	return mysqli_affected_rows($koneksi);
}
function deleteDataUser($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id' ");
	return mysqli_affected_rows($koneksi);
}

/* ------------------- MUSIC --------------------- */
function deleteDataMusic($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM music WHERE id_music = '$id' ");
	return mysqli_affected_rows($koneksi);
}
function insertDataMusic($data,$file){
	global $koneksi;
	$artist = $data['artist'];
	$genre = $data['genre']; 
	$title = $file['title']['name']; 
	$image = $file["image"]["name"];

	/* TARGET DIR */
	$music_dir = "../../assets/music/";
	$music_file =$music_dir.basename($file["title"]["name"]);
	$sizeMusic = $file["title"]["size"];

	$cover_dir = "../../assets/images/cover-music/";
	$cover_file =$cover_dir.basename($file["image"]["name"]);
	$sizeImage = $file["image"]["size"];

	// type file
	$covertype = strtolower(pathinfo($cover_file,PATHINFO_EXTENSION));
	$musictype = strtolower(pathinfo($music_file,PATHINFO_EXTENSION));


	$cover_name = $cover_dir.basename(str_replace('.mp3','', $title).'.'.$covertype);
	$cover_name2 = str_replace('.mp3','', $title).'.'.$covertype;

	if ($musictype != "mp3" && $musictype != "wav" && $musictype != "flac") {
		echo "file music harus berupa : mp3,wav atau flac";
	}else{
		if ($covertype != "jpg" && $covertype != "png" && $covertype != "jpeg") {
			echo "file music harus berupa  : jpg,png,jpeg";
		}else{
			if ($sizeMusic >= 10000000) {
				echo "<br> size music terlalu besar(max 9mb)";
			}elseif($sizeImage >= 5000000){
				echo "<br> size image terlalu besar(max 5mb)";
			}
			else{
				if (move_uploaded_file($_FILES["image"]["tmp_name"],$cover_name) AND move_uploaded_file($_FILES["title"]["tmp_name"],$music_file)) {
					$query = mysqli_query($koneksi,"INSERT INTO music VALUES 
						('','$title','$genre','$artist','$cover_name2')");
					if (!$query) {
						echo "gagal";
					}
				}else{
					echo "insert gagal";
				}

			}
		}
	}

	return mysqli_affected_rows($koneksi);
}
function updateMusic($data,$file){
	global $koneksi;
	$id = $data['id'];
	$artist = $data['penyanyiUpdate'];
	$genre = $data['genreUpdate'];
	$title = $file['titleUpdate']['name'];
	$image = $file["imageUpdate"]["name"];

	if (!empty($title) && !empty($image)) {
		/* TARGET DIR */
		$music_dir = "../../assets/music/";
		$music_file =$music_dir.basename($file["titleUpdate"]["name"]);
		$sizeMusic = $file["titleUpdate"]["size"];

		$cover_dir = "../../assets/images/cover-music/";
		$cover_file =$cover_dir.basename($file["imageUpdate"]["name"]);
		$sizeImage = $file["imageUpdate"]["size"];

		/* type file */
		$covertype = strtolower(pathinfo($cover_file,PATHINFO_EXTENSION));
		$musictype = strtolower(pathinfo($music_file,PATHINFO_EXTENSION));


		$cover_name = $cover_dir.basename(str_replace('.mp3','', $title).'.'.$covertype);
		$cover_name2 = str_replace('.mp3','', $title).'.'.$covertype;

		if ($musictype != "mp3" && $musictype != "wav" && $musictype != "flac") {
			echo "file music harus berupa : mp3,wav atau flac";
		}else{
			if ($covertype != "jpg" && $covertype != "png" && $covertype != "jpeg") {
				echo "file music harus berupa  : jpg,png,jpeg";
			}else{
				if ($sizeMusic >= 10000000) {
					echo "<br> size music terlalu besar(max 9mb)";
				}elseif($sizeImage >= 5000000){
					echo "<br> size image terlalu besar(max 5mb)";
				}
				else{
					if (move_uploaded_file($_FILES["imageUpdate"]["tmp_name"],$cover_name) AND move_uploaded_file($_FILES["titleUpdate"]["tmp_name"],$music_file)) {
						$query = mysqli_query($koneksi,"UPDATE music SET 
							judul = '$title',
							genre = '$genre',
							penyanyi = '$artist',
							poster_lagu = '$cover_name2' WHERE id_music = '$id' ");
						if (!$query) {
							echo "gagal";
						}
					}else{
						echo "update gagal";
					}

				}
			}
		}
	}elseif (!empty($title)) {
		$music_dir = "../../assets/music/";
		$music_file =$music_dir.basename($file["titleUpdate"]["name"]);
		$sizeMusic = $file["titleUpdate"]["size"];

		$covertype = strtolower(pathinfo($cover_file,PATHINFO_EXTENSION));
		$musictype = strtolower(pathinfo($music_file,PATHINFO_EXTENSION));

		if ($musictype != "mp3" && $musictype != "wav" && $musictype != "flac") {
			echo "file music harus berupa : mp3,wav atau flac";
		}else{
			if ($sizeMusic >= 10000000) {
				echo "<br> size music terlalu besar(max 9mb)";
			}else{
				if (move_uploaded_file($_FILES["titleUpdate"]["tmp_name"],$music_file)) {
					$query = mysqli_query($koneksi,"UPDATE music SET 
						judul = '$title',
						genre = '$genre',
						penyanyi = '$artist',
						lirik = '$lirik' WHERE id_music = '$id' ");
					if (!$query) {
						echo "gagal";
					}
				}else{
					echo "update gagal";
				}
			}
		}
	}elseif (!empty($image)) {
		$cover_dir = "../../assets/images/cover-music/";
		$cover_file =$cover_dir.basename($file["imageUpdate"]["name"]);
		$sizeImage = $file["imageUpdate"]["size"];

		$cover_name = $cover_dir.basename(str_replace('.mp3','', $title).'.'.$covertype);
		$cover_name2 = str_replace('.mp3','', $title).'.'.$covertype;


		if ($covertype != "jpg" && $covertype != "png" && $covertype != "jpeg") {
			echo "file music harus berupa  : jpg,png,jpeg";
		}else{
			if($sizeImage >= 5000000){
				echo "<br> size image terlalu besar(max 5mb)";
			}else{
				if (move_uploaded_file($_FILES["imageUpdate"]["tmp_name"],$cover_name)) {
					$query = mysqli_query($koneksi,"UPDATE music SET 
						genre = '$genre',
						penyanyi = '$artist',
						poster_lagu = '$cover_name2',
						lirik = '$lirik' WHERE id_music = '$id' ");
					if (!$query) {
						echo "gagal";
					}
				}else{
					echo "update gagal";
				}
			}
		}
	}else{
		$query = mysqli_query($koneksi,"UPDATE music SET 
			genre = '$genre',
			penyanyi = '$artist',
			lirik = '$lirik' WHERE id_music = '$id' ");
		if (!$query) {
			echo "gagal";
		}else{
			echo "update gagal";
		}
	}
	return mysqli_affected_rows($koneksi);
}

/* -------------------- PLAYLIST --------------------- */
function insertPlaylist($data,$file){
	global $koneksi;
	$namaPlaylist = $data['namaPlaylist'];
	$id = $data['id'];

	$target_dir = "../../assets/images/cover-playlist/";
	$target_file =$target_dir.basename($file["cover"]["name"]);
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$imageName = $namaPlaylist.'.'.$filetype;
	$target_image =$target_dir.basename($imageName);
	$sizeFile = $file["cover"]["size"];

	if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
		echo "<br>masukan file  : jpg,png,jpeg";
	}else{
		if ($sizeFile <= 500000) {
			if (move_uploaded_file($_FILES["cover"]["tmp_name"],$target_image)) {
				$query = mysqli_query($koneksi,"INSERT INTO playlist_name VALUES 
					('','$id','$namaPlaylist','$imageName')");
			}else{
				echo "gagal";
			}
		}else{
			echo "<br> File Kegeedan : ", $sizeFile;
		}
	}
	return mysqli_affected_rows($koneksi);
}
function deletePlaylist($id){
	global $koneksi;
	$query = mysqli_query($koneksi,"DELETE FROM playlist_name WHERE id_playlist_name = '$id' ");
	return mysqli_affected_rows($koneksi);
}
function updatePlaylist($data,$file){
	global $koneksi;
	$namaPlaylist = $data['namaPlaylist'];
	$id = $data['id'];
	if (!empty($file['coverPlaylist']['name'])) {
		$target_dir = "../../assets/images/cover-playlist/";
		$target_file =$target_dir.basename($file["coverPlaylist"]["name"]);
		$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imageName = $namaPlaylist.'.'.$filetype;
		$target_image =$target_dir.basename($imageName);
		$sizeFile = $file["coverPlaylist"]["size"];

		if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
			echo "<br>masukan file  : jpg,png,jpeg";
		}else{
			if ($sizeFile <= 500000) {
				if (move_uploaded_file($_FILES["coverPlaylist"]["tmp_name"],$target_image)) {
					$query = mysqli_query($koneksi,"UPDATE playlist_name SET playlist_name = '$namaPlaylist', imagePlaylist = '$imageName' WHERE id_playlist_name = '$id' ");
					if (!$query) {
						echo "update gagal";
					}
				}else{
					echo "gagal";
				}
			}else{
				echo "<br> File Kegeedan : ", $sizeFile;
			}
		}
	}else{
		$query = mysqli_query($koneksi,"UPDATE playlist_name SET playlist_name = '$namaPlaylist' WHERE id_playlist_name = '$id' ");
		if (!$query) {
			echo "update gagal";
		}
	}
	return mysqli_affected_rows($koneksi);
}
function insertMusicPlaylist($data){
	global $koneksi;
	$id_playlist = $data['id_playlist_name'];
	$id_user = $data['id_user'];
	foreach ($data['musicPlaylist'] as $value) {
		$query = mysqli_query($koneksi,"INSERT INTO playlist VALUES('','$id_playlist','$value','$id_user')");
	}
	return mysqli_affected_rows($koneksi);
}





