<?php

    Class form extends tagLibrary {
        public function dummy() {}

        public function text($name, $data, $pars){
            

            return "<div class=\"form-group\">
    <label class=\"form-label\">{$pars['label']}</label>
    <span class=\"help\">{$pars['placeholder']}</span>
    <div class=\"controls\">
        <input name=\"{$name}\" type=\"text\" value=\"{$data}\" class=\"form-control\">
    </div>
</div>";

            
        }

        public function hidden($name, $data, $pars){

            return "<input name=\"{$name}\" type=\"hidden\" value=\"{$pars['value']}\">";

            
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
    }
    

?>