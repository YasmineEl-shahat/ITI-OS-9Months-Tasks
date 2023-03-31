<?php

namespace superb_ecommerce_SuperbThemesCustomizer\Utils;

use superb_ecommerce_SuperbThemesCustomizer\CustomizerController;
use superb_ecommerce_SuperbThemesCustomizer\CustomizerPanels;

use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerType;

class CustomizerItem
{
    const REFOCUS_WRAPPER_AFFIX = "_refocus_wrapper";


    private $id;
    private $label;
    private $description;
    private $type;
    private $parents;
    private $priority;
    private $alt_id;
    private $default_value;
    private $section;

    public function __construct($id, $options)
    {
        $defaults = array('type' => "", 'label' => "", "description" => "", "parents" => [""], "alt_id" => false, "priority" => 10, "default" => "", "section" => "");
        $options = array_merge($defaults, $options);
        $this->id = $id;
        $this->type = $options['type'];
        $this->label = $options['label'];
        $this->description = $options['description'];
        $this->parents = $options['parents'];
        $this->priority = $options['priority'];
        $this->alt_id = $options['alt_id'];
        $this->default_value = $options['default'];
        $this->section = $options['section'];

        switch ($this->type) {
            case CustomizerType::PANEL:
                $this->AddPanel();
                break;
            case CustomizerType::SECTION:
                $this->AddSection();
                break;
            case CustomizerType::CONTROL_CHECKBOX:
            case CustomizerType::CONTROL_COLOR:
            case CustomizerType::CONTROL_TEXT:
                $this->AddControl();
                break;
            default:
                //nothing
                break;
        }
    }


    public function GetId()
    {
        return $this->id;
    }

    public function GetAltId()
    {
        return $this->alt_id;
    }

    public function HasAlternativeId()
    {
        return $this->alt_id !== false;
    }

    public function GetLabel()
    {
        return $this->label;
    }

    public function GetDescription()
    {
        return $this->description;
    }

    public function GetType()
    {
        return $this->type;
    }

    public function GetParents()
    {
        return $this->parents;
    }

    public function GetPriority()
    {
        return $this->priority;
    }

    public function GetDefaultValue()
    {
        return $this->default_value;
    }


    private function AddPanel()
    {
        CustomizerController::GetCustomizerObject()->add_panel($this->GetId(), array(
            'title'    => $this->GetLabel(),
            'description' => $this->GetDescription(),
            'priority' => $this->GetPriority()
        ));
    }

    private function AddSection()
    {
        foreach ($this->GetParents() as $parent) {
            $section = $parent.$this->GetId();

            CustomizerController::GetCustomizerObject()->add_section($section, array(
                'title'    => $this->GetLabel(),
                'description' => $this->GetDescription(),
                'priority' => $this->GetPriority(),
                'panel' => $parent
            ));

            if (count($this->GetParents()) > 1) {
                $wrapper_id = $section.self::REFOCUS_WRAPPER_AFFIX;
                $buttons = array();
                foreach ($this->GetParents() as $other_parent) {
                    if ($this->HasAlternativeId() && $parent === $other_parent) {
                        // Has alternative ID, should not create refocus buttons in other parents
                        continue;
                    }
                    if ($other_parent!==$parent) {
                        $buttons[] = $this->AddRefocusButton(
                            $wrapper_id,
                            $parent,
                            $other_parent
                        );
                    }
                }

                CustomizerController::GetCustomizerObject()->add_control(new RefocusButtonControl(CustomizerController::GetCustomizerObject(), $wrapper_id, array(
                    'priority' => 0,
                    'settings' => array(),
                    'section' => $section,
                    ), $buttons));
            }

            // Has alternative ID, should not only be made in first parent.
            if ($this->HasAlternativeId()) {
                break;
            }
        }
    }

    private function AddRefocusButton($wrapper_id, $current_parent, $other_parent)
    {
        $button_id = $current_parent.$this->GetId()."_to_".$other_parent.$this->GetId()."_btn";
        $refocus_id = $this->HasAlternativeId() ? $other_parent.$this->GetAltId() : $other_parent.$this->GetId();
        $title = CustomizerController::GetCustomizerObject()->get_panel($other_parent)->title;

        $button = false;
        if (in_array($other_parent, CustomizerPanels::SHOULD_REFOCUS_TO_PANEL)) {
            $button = new CustomizerRefocusButton($wrapper_id, $button_id, $refocus_id, $title, "panel", $other_parent);
        } else {
            $button = new CustomizerRefocusButton($wrapper_id, $button_id, $refocus_id, $title);
        }

        CustomizerController::AddRefocusButtonToScripts($button);

        return $button;
    }


    private function AddControl()
    {
        $section = $this->section;

        switch ($this->GetType()) {
            case CustomizerType::CONTROL_CHECKBOX:
            case CustomizerType::CONTROL_TEXT:
                CustomizerController::GetCustomizerObject()->add_setting($this->GetId(), array(
                    'default'           => $this->GetDefaultValue(),
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options',
                    'type'              => 'theme_mod',
                ));
                break;
            case CustomizerType::CONTROL_COLOR:
                CustomizerController::GetCustomizerObject()->add_setting($this->GetId(), array(
                    'default'           => $this->GetDefaultValue(),
                    'sanitize_callback' => 'sanitize_hex_color',
                    'transport'         => 'postMessage',
                    'capability'        => 'edit_theme_options',
                    'type'              => 'theme_mod',
                ));
                break;
        }

        switch ($this->GetType()) {
            case CustomizerType::CONTROL_CHECKBOX:
            case CustomizerType::CONTROL_TEXT:
                CustomizerController::GetCustomizerObject()->add_control($this->GetId(), array(
                    'label'    => $this->GetLabel(),
                    'description' => $this->GetDescription(),
                    'priority' => $this->GetPriority(),
                    'section'  => $section,
                    'settings' => $this->GetId(),
                    'type'     => $this->GetType(),
                ));
                break;
            case CustomizerType::CONTROL_COLOR:
                CustomizerController::GetCustomizerObject()->add_control(new \WP_Customize_Color_Control(CustomizerController::GetCustomizerObject(), $this->GetId(), array(
                    'label'       => $this->GetLabel(),
                    'description' => $this->GetDescription(),
                    'section'     => $section,
                    'priority'   => $this->GetPriority(),
                    'settings'    => $this->GetId(),
                )));
                break;
        }
    }
}
