<?php
namespace Isign\DocumentTypeGuesser;

interface DocumentTypeGuesserInterface
{
    public function guess($content, $extension);
}