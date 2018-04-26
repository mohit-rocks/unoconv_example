<?php

namespace Drupal\unoconv_example;

/**
 * Interface UnoconvTranscodeInterface.
 */
interface UnoconvTranscodeInterface {

  /**
   * Provides method to transcode document and generate it's PDF file for preview.
   *
   * @param string $source_path
   *   Actual source path of file which is to be converted.
   * @param string $destination_path
   *   Destination path where converted file should be saved.
   * @param string $destination_uri
   *   Destination URI where file should get saved.
   *
   * @return mixed
   *   File object after it is saved at destination path.
   */
  public function transcode($source_path, $destination_path, $destination_uri);

}
