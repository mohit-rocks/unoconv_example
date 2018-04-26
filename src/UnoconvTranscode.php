<?php

namespace Drupal\unoconv_example;
use Drupal\Core\File\FileSystem;
use Unoconv\Unoconv;

/**
 * Class UnoconvTranscode.
 */
class UnoconvTranscode implements UnoconvTranscodeInterface {

  /**
   * Drupal\Core\File\FileSystem definition.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem;
  /**
   * Constructs a new UnoconvTranscode object.
   */
  public function __construct(FileSystem $file_system) {
    $this->fileSystem = $file_system;
  }

  /**
   * {@inheritdoc}
   */
  public function transcode($source_path, $destination_path, $destination_uri) {

    $unoconv = Unoconv::create(array(
      'timeout'          => 42,
      'unoconv.binaries' => '/usr/bin/unoconv',
    ));
    $unoconv->transcode($source_path, 'pdf', $destination_path);

    // Saving new converted preview pdf file and attach it to media entity.
    $data = file_get_contents($destination_path);
    $preview_file = file_save_data($data, $destination_uri, FILE_EXISTS_RENAME);

    return $preview_file;
  }

}
