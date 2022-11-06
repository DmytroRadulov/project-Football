<?php

function getUrl(): string
{
    $url = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $url)[0];
}

//dd(dbSelect(Tables:: Content, conditions: 'name= "reviews"'));

function convertContentToAssoc(array $data = []): array
{
    $assoc = [];

    if (!empty($data)) {
        foreach ($data as $row) {
            $assoc[$row['name']] = json_decode($row['body'], true);
        }
    }
    return $assoc;
}

function redirect($path = '/')
{
    $url = DOMAIN . $path;
    header("Location: {$url}");
    exit;
}

function showSocials(array $socials): string
{
    $template = '<a href="%s" target="_blank"><i class="%s"></i></a>';
    $html = '';
    foreach ($socials as $social => $link){
        $social = ucfirst($social);
       $socialFAIcon = SocialFAIcons::byName($social);
       $html .= sprintf(
           $template,
           $link,
           $socialFAIcon->value
       );
    }


    return $html;
}

function getRequestType(): mixed
{
    $type = filter_input(INPUT_POST,'type');
    unset($_POST['type']);

    return $type;
}

function emptyFields(array $field,$key): bool
{
   $result = false;
   $emptyFields = array_keys($field,null);

   if (!empty($emptyFields)){
       foreach ($emptyFields as $fieldName){
           $_SESSION[$key]['errors'][$fieldName] = "поле'{$fieldName}' не должно быть пустым";
       }
       $result = true;
   }

   return $result;

}

function formError(string|null $message = null): string
{
    $html = '';
    $template = "<span class='alert alert-danger mt-3'>%s</span>";
    if ($message){
       $html = sprintf($template,$message);

    }
    return $html;
}

function alert(string $class, string $text)
{
    unset($_SESSION['alert']);
    $_SESSION['alert'] = compact('class', 'text');
}

