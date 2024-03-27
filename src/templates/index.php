<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/style.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;700&display=swap" rel="stylesheet">

	<title>Sputnik - Url Shortener</title>
</head>

<body>
	<main class="w-5/6 max-w-xl mx-auto py-12">
		<h1 class="text-4xl text-center font-bold">Sputnik</h1>
		<div class="mt-14">
			<p class="text-center text-lg font-medium mb-4 capitalize text-stone-600">Your simple solution to shorten links</p>

			<?php if (isset($errors) && count($errors) > 0) : ?>
				<ul>
					<?php foreach ($errors as $error) : ?>
						<li class="text-sm text-rose-400 mb-2"> <?= $error ?> </li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>

			<form method="POST" action="/" class="flex gap-2">
				<label class="flex items-center w-full gap-2 border-2 border-purple-100 rounded-md p-2">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
						<path class="fill-stone-400/80" d="M137.54 186.36a8 8 0 0 1 0 11.31l-9.94 10a56 56 0 0 1-79.22-79.27l24.12-24.12a56 56 0 0 1 76.81-2.28a8 8 0 1 1-10.64 12a40 40 0 0 0-54.85 1.63L59.7 139.72a40 40 0 0 0 56.58 56.58l9.94-9.94a8 8 0 0 1 11.32 0m70.08-138a56.08 56.08 0 0 0-79.22 0l-9.94 9.95a8 8 0 0 0 11.32 11.31l9.94-9.94a40 40 0 0 1 56.58 56.58l-24.12 24.14a40 40 0 0 1-54.85 1.6a8 8 0 1 0-10.64 12a56 56 0 0 0 76.81-2.26l24.12-24.12a56.08 56.08 0 0 0 0-79.24Z" />
					</svg>

					<?php $link = $link ?? "" ?>
					<input required name="link" id="link" class="bg-transparent flex-1 placeholder:text-stone-400/80 outline-none" type="text" placeholder="Enter your link here..." value="<?= $link ?>">
				</label>
				<button type="submit" class="border-2 border-purple-100 aspect-square rounded-md w-12 flex items-center justify-center active:scale-95">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
						<path class="fill-purple-300" d="m148.48 67.93l-3.41 3.93a12 12 0 1 1-18.14-15.72l3.72-4.29c.19-.21.38-.42.58-.62a52 52 0 0 1 73.54 73.54c-.2.2-.41.39-.62.58l-4.29 3.72a12 12 0 1 1-15.72-18.14l3.93-3.41a28 28 0 0 0-39.59-39.59m-20.62 115a12 12 0 0 0-16.93 1.21l-3.41 3.93a28 28 0 0 1-39.59-39.59l3.93-3.41a12 12 0 0 0-15.72-18.14l-4.29 3.72c-.21.19-.42.38-.62.58a52 52 0 0 0 73.54 73.54c.2-.2.39-.41.58-.62l3.72-4.29a12 12 0 0 0-1.21-16.93M208 148h-20a12 12 0 0 0 0 24h20a12 12 0 0 0 0-24M48 108h20a12 12 0 0 0 0-24H48a12 12 0 0 0 0 24m112 68a12 12 0 0 0-12 12v20a12 12 0 0 0 24 0v-20a12 12 0 0 0-12-12M96 80a12 12 0 0 0 12-12V48a12 12 0 0 0-24 0v20a12 12 0 0 0 12 12" />
					</svg>
				</button>
			</form>

			<div class="flex gap-2 mt-4">
				<p class="flex-1 gap-2 border-2 border-purple-100 rounded-md p-2 w-full text-center font-medium">
					<?php if (isset($result) && $result !== "") : ?>
						<?= $result ?>
					<?php endif ?>
				</p>

				<button class="flex gap-2 items-center justify-center px-4 py-2 border-2 border-purple-100 rounded-md text-purple-300 active:scale-95 font-medium">
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 256 256">
						<path fill="currentColor" d="M216 32H88a8 8 0 0 0-8 8v40H40a8 8 0 0 0-8 8v128a8 8 0 0 0 8 8h128a8 8 0 0 0 8-8v-40h40a8 8 0 0 0 8-8V40a8 8 0 0 0-8-8m-56 176H48V96h112Zm48-48h-32V88a8 8 0 0 0-8-8H96V48h112Z" />
					</svg>
					Copy Link
				</button>
			</div>
		</div>
	</main>
</body>

</html>
