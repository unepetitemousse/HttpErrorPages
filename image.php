<?php

function resizeImage($imagePath, $width, $height, $filterType = imagick::FILTER_UNDEFINED, $blur = 0.5, $bestFit = true, $cropZoom = false) {
  // Le facteur de flou où &gt; 1 correspond à totalement flou, et &lt; 1 correspond à fort.
  $imagick = new \Imagick(realpath($imagePath));

  $imagick->resizeImage($width, $height, $filterType, $blur, $bestFit);

  $cropWidth = $imagick->getImageWidth();
  $cropHeight = $imagick->getImageHeight();

  if ($cropZoom) {
    $newWidth = $cropWidth / 2;
    $newHeight = $cropHeight / 2;

    $imagick->cropimage(
      $newWidth,
      $newHeight,
      ($cropWidth - $newWidth) / 2,
      ($cropHeight - $newHeight) / 2
    );

    $imagick->scaleimage(
      $imagick->getImageWidth() * 4,
      $imagick->getImageHeight() * 4
    );
  }

  $imagick->setImageFormat("png");
  $imagick->setBackgroundColor(new ImagickPixel('transparent'));

  return $imagick->getImageBlob();
}