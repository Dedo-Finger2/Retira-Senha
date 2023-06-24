<!-- "Estrutura da home sem Bootstrap" - Joice a -->
<!Doctype html>
<html lang="pt-Br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale-
		=1.0">
		<meta http-equiv="X-UA-compatible" content="IE=Edge">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<title></title>
	</head>
	<body>
		<header>
			<!-- O require está importando o conteúdo do arquivo navbar -->
			<?php require_once ("navbar.php") ?>
		</header>
		<article>
			<section>
				<div>
					<!-- "aqui será incluido a tabela do DataTables" - Joice -->
				</div>
			</section>
		</article>
			<footer>
				<!-- "O require esta importando o contenção do arquivo footer" - Joice -->
			<?php require_once ("../View/footer.php");?>
		</footer>
	</body>
</html>