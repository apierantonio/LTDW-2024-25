<?php

    Class form extends tagLibrary {
        public function dummy() {}

        public function text($name, $data, $pars){

            if (isset($pars['disabled'])) {
                preg_match("~({$pars[disabled]})~", basename($_SERVER['SCRIPT_NAME']), $matches);

                if ($matches[1] == $pars['disabled']) {
                    return "<div class=\"form-group\">
                        <label class=\"form-label\">{$pars['label']}</label>
                        <span class=\"help\">{$pars['placeholder']}</span>
                        <div class=\"controls\">
                            <input name=\"{$name}\" type=\"text\" value=\"{$data}\" disabled class=\"form-control\">
                        </div>
                    </div>";
                    
                }   else {
                    return "<div class=\"form-group\">
                        <label class=\"form-label\">{$pars['label']}</label>
                        <span class=\"help\">{$pars['placeholder']}</span>
                        <div class=\"controls\">
                            <input name=\"{$name}\" type=\"text\" value=\"{$data}\" class=\"form-control\">
                        </div>
                    </div>"; 
                }
            } else {
                return "<div class=\"form-group\">
                        <label class=\"form-label\">{$pars['label']}</label>
                        <span class=\"help\">{$pars['placeholder']}</span>
                        <div class=\"controls\">
                            <input name=\"{$name}\" type=\"text\" value=\"{$data}\" class=\"form-control\">
                        </div>
                    </div>"; 
            }
        }


        public function hidden($name, $data, $pars){

            if ($data != "") {
                $value = $data;
            } else {
                $value = $pars['value'];
            } 

            return "<input name=\"{$name}\" type=\"hidden\" value=\"{$value}\">";

            
        }

        public function password($name, $data, $pars){

            return "<div class=\"form-group\">
    <label class=\"form-label\">{$pars['label']}</label>
    <span class=\"help\">{$pars['placeholder']}</span>
    <div class=\"controls\">
        <input name=\"{$name}\" value=\"{$data}\" type=\"password\" class=\"form-control\">
    </div>
</div>";

            
        }

        public function email($name, $data, $pars){

            return "<div class=\"form-group\">
    <label class=\"form-label\">{$pars['label']}</label>
    <span class=\"help\">{$pars['placeholder']}</span>
    <div class=\"controls\">
        <input name=\"{$name}\" value=\"{$data}\" type=\"email\" class=\"form-control\">
    </div>
</div>";

            
        }

        public function date($name, $data, $pars){

            return "<div class=\"form-group\">
    <label class=\"form-label\">{$pars['label']}</label>
    <span class=\"help\">{$pars['placeholder']}</span>
    <div class=\"controls\">
        <input name=\"{$name}\" value=\"{$data}\" type=\"date\" class=\"form-control\">
    </div>
</div>";

            
        }

        public function editor($name, $data, $pars){

            return "<div class=\"form-group\">
                    <label class=\"form-label\">{$pars['label']}</label>
      
                    <div class=\"controls\">
                        <textarea id=\"text-editor\" placeholder=\"Enter text ...\" class=\"form-control\" rows=\"10\"></textarea>
                    </div>
              </div>";
        }

        function operation($name, $data, $pars) {
            if ($data != "") {
                return $data;
            } else {
                // Match 'add', 'edit', or 'delete' in the script name
                preg_match('~(add|edit|delete)~', basename($_SERVER['SCRIPT_NAME']), $matches);

                if (!empty($matches[1])) {
                    switch ($matches[1]) {
                        case "add":
                            return "Add";
                        case "edit":
                            return "Edit";
                        case "delete":
                            return "Delete";
                    }
                }

                // Default fallback
                return "Default";
            }
        }
    }
    

?>