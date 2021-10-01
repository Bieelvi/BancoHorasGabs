<?php 

namespace App\Helper;

trait RenderHtml 
{
    public function renderizaHtml(string $path, array $content): ?string
    {
        extract($content);
		ob_start();

		require __DIR__ . '/../../view/' . $path;

		$html = ob_get_clean();

		return $html;
    }
}