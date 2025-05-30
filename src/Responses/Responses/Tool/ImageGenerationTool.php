<?php

declare(strict_types=1);

namespace OpenAI\Responses\Responses\Tool;

final class ImageGenerationTool
{
    public function __construct(
        public readonly string $type,
        public readonly ?string $model = null,
        public readonly ?array $params = null,
    ) {}

    public static function from(array $attributes): self
    {
        return new self(
            type: $attributes['type'],
            model: $attributes['model'] ?? null,
            params: $attributes['params'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'model' => $this->model,
            'params' => $this->params,
        ];
    }
}
