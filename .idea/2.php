<?php
interface Button {
    public function render();
    public function onClick();
}

abstract class AButton {
    protected string $text;

    public function __construct(string $text) {
        $this->text = $text;
    }
}

class WindowsButton extends AButton implements Button {
    public function render() {
        echo "<C_BUTTON lang='c#'>{$this->text}</C_BUTTON>" . PHP_EOL;
    }
    public function onClick() {
        echo 'WindowsButton Clicked' . PHP_EOL;
    }
}

class WebButton extends AButton implements Button {
    public function render() {
        echo "<button type='button'>{$this->text}</button>" . PHP_EOL;
    }
    public function onClick() {
        echo 'WebDialog Clicked' . PHP_EOL;
    }
}


interface Dialog {
    public function render();
    public function createButton(string $text): Button;
}

class WindowsDialog implements Dialog {
    public function render() {}
    public function createButton(string $text): Button {
        return new WindowsButton($text);
    }
}

class WebDialog implements Dialog {
    public function render() {}
    public function createButton(string $text): Button
    {
        return new WebButton($text);
    }
}


$dialog = new WindowsDialog();
$button = $dialog->createButton('Hello');
$button->render();
$button->onClick();