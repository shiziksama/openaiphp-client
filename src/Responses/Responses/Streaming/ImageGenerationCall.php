<?php

declare(strict_types=1);

namespace OpenAI\Responses\Responses\Streaming;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Responses\Meta\MetaInformation;

/**
 * @phpstan-type ImageGenerationCallType array{id: string, prompt: string, status: string, type: 'image_generation_call', url?: string, b64_json?: string, revised_prompt?: string}
 *
 * @implements ResponseContract<ImageGenerationCallType>
 */
final class ImageGenerationCall implements ResponseContract
{
    /**
     * @use ArrayAccessible<ImageGenerationCallType>
     */
    use ArrayAccessible;

    private function __construct(
        public readonly string $id,
        public readonly string $prompt,
        public readonly string $status,
        public readonly string $type,
        public readonly ?string $url = null,
        public readonly ?string $b64_json = null,
        public readonly ?string $revisedPrompt = null,
        private readonly ?MetaInformation $meta = null,
    ) {}

    /**
     * @param ImageGenerationCallType $attributes
     */
    public static function from(array $attributes, ?MetaInformation $meta = null): self
    {
        return new self(
            id: $attributes['id'],
            prompt: $attributes['prompt'] ?? '',
            status: $attributes['status'] ?? '',
            type: $attributes['type'] ?? '',
            url: $attributes['url'] ?? null,
            b64_json: $attributes['b64_json'] ?? null,
            revisedPrompt: $attributes['revised_prompt'] ?? null,
            meta: $meta,
        );
    }

    public function toArray(): array
    {
        $data = [
            'id' => $this->id,
            'prompt' => $this->prompt,
            'status' => $this->status,
            'type' => $this->type,
        ];
        if ($this->url !== null) {
            $data['url'] = $this->url;
        }
        if ($this->b64_json !== null) {
            $data['b64_json'] = $this->b64_json;
        }
        if ($this->revisedPrompt !== null) {
            $data['revised_prompt'] = $this->revisedPrompt;
        }
        return $data;
    }
}
