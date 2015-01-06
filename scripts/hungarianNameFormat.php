<?php

namespace Soulware\HungarianNameFormat;

class hungarianNameFormat {

    public function install($files_to_change) {

        $console_messages = true;


        if (isset($files_to_change) && is_array($files_to_change)) {

            if ($console_messages)
                echo "<br />-------------------------------<br/>";
            if ($console_messages)
                echo "file list found.<br />";

            foreach ($files_to_change as $file_info) {

                if ($source_path = $this->switch_getSourceFilePath($file_info->module, $file_info->type, $file_info->sourcefile)) {

                    $paths = $this->switch_getPaths($file_info->module, $file_info->type, $file_info->sourcefile);

                    if (!$file_content = file_get_contents($source_path)) {
                        if ($console_messages)
                            echo "opening " . $source_path . " faliled<br />";
                    }
                    else {
                        if ($console_messages)
                            echo "opening " . $source_path . " succeeded<br />";
                    }

                    if ($console_messages)
                        echo "switching fileds in " . $file_info->sourcefile . " <br />";

                    $new_content = $this->switchFields($file_content, $file_info->replace);

                    if ($console_messages)
                        echo "saving content to " . $paths['custom_path'] . " <br />";

                    $this->switch_createDirStructure($paths['custom_path']);

                    file_put_contents($paths['custom_path'], $new_content);

                    if ($console_messages)
                        echo ":)<br />";
                }
                else {

                    if ($console_messages)
                        echo "no sourcefile found.<br />";
                }
            }
        }
        else {

            if ($console_messages)
                echo "file list not found.<br />";
        }
    }

    public function switchFields($content, $replace_array) {

        $new_string = strtr($content, $replace_array);

        return $new_string;
    }

    public function switch_getSourceFilePath($module, $type, $sourcefile) {

        $paths = $this->switch_getPaths($module, $type, $sourcefile);

        if (is_file($paths['custom_path'])) {
            return $paths['custom_path'];
        } elseif (is_file($paths['path'])) {
            return $paths['path'];
        } else {
            return false;
        }
    }

    public function switch_getPaths($module, $type, $sourcefile) {

        $path = 'modules/' . $module . '/' . $type . '/' . $sourcefile;
        $custom_path = 'custom/' . $path;

        return array('path' => $path, 'custom_path' => $custom_path);
    }

    public function switch_createDirStructure($path) {

        $current_path = "";

        $dir_array = $this->switch_getDirArray($path);

        foreach ($dir_array as $dir) {

            $current_path .= $dir . "/";

            if (!is_dir($current_path)) {

                mkdir($current_path);
            }
        }

        return true;
    }

    public function switch_getDirArray($path) {

        $return_array = explode('/', $path);
        array_pop($return_array);

        return $return_array;
    }

}

?>
