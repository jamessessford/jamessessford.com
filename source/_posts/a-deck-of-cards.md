---
extends: _layouts.post
section: content
title: A deck of cards
date: 2024-10-30
description: Creating a deck of cards with PHP for use with Verbs
categories: [development]
excerpt: Creating a deck of cards with PHP for use with Verbs
---

I've been working lately with [Verbs](https://verbs.thunk.dev) and [Livewire](https://livewire.laravel.com) and thought a fun experiment would be to try and create some card games that I enjoy playing.

To facilate this, I need to define a deck of cards that I can use in any of the projects that I work on after this.

The deck of cards needs to contain a ```Card```, ```Deck``` and ```CardCollection``` class. A card should have a suit and a value, and the deck should consist of 52 cards. Because the suits and values are all defined for a deck of cards, I can use Enums for the properties of a card.

The ```CardCollection``` class allows me to store a collection of cards safely in a Verbs state.

```php
<?php
//  Cards/Enums/Suit.php

declare(strict_types=1);

namespace Cards\Enums;

enum Suit: string
{
    case Clubs = 'Clubs';
    case Diamonds = 'Diamonds';
    case Hearts = 'Hearts';
    case Spades = 'Spades';
}
```

```php
<?php
//  Cards/Enums/Value.php

declare(strict_types=1);

namespace Cards\Enums;

enum Value: string
{
    case Two = 'Two';
    case Three = 'Three';
    case Four = 'Four';
    case Five = 'Five';
    case Six = 'Six';
    case Seven = 'Seven';
    case Eight = 'Eight';
    case Nine = 'Nine';
    case Ten = 'Ten';
    case Jack = 'Jack';
    case Queen = 'Queen';
    case King = 'King';
    case Ace = 'Ace';
}
```

```php
<?php
//  Cards/Card.php

declare(strict_types=1);

namespace Cards;

use Cards\Enums\Suit;
use Cards\Enums\Value;

final readonly class Card
{
    public function __construct(
        public Suit $suit,
        public Value $value,
    ) {}
}
```

```php
<?php
//  Cards/CardCollection.php

declare(strict_types=1);

namespace Cards;

use Illuminate\Support\Collection;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Thunk\Verbs\SerializedByVerbs;

class CardCollection extends Collection implements SerializedByVerbs
{
    public static function deserializeForVerbs(mixed $data, DenormalizerInterface $denormalizer): static
    {
        return static::make($data)
            ->map(fn($serialized) => Card::deserializeForVerbs($serialized, $denormalizer));
    }

    public function serializeForVerbs(NormalizerInterface $normalizer): string|array
    {
        return $this->map(fn(Card $card) => $card->serializeForVerbs($normalizer))->toJson();
    }
}
```

```php
<?php
//  Cards/Deck.php

declare(strict_types=1);

namespace Cards;

use Cards\Enums\Suit;
use Cards\Enums\Value;

final class Deck
{
    public CardCollection $cards;

    public function __construct()
    {
        $this->cards = CardCollection::make([]);

        collect(CardSuit::cases())
            ->each(function (CardSuit $suit): void {
                collect(CardValue::cases())
                    ->each(function (CardValue $value) use ($suit): void {
                        $this->cards->push(new Card($suit, $value));
                    });
            });

        $this->shuffle();
    }

    public function shuffle(): void
    {
        $this->cards = $this->cards
            ->shuffle()
            ->reverse();
    }

    public function deal(): ?Card
    {
        if (0 === $this->cards->count()) {
            return null;
        }

        return $this->cards->pop();
    }

    public function remainingCards(): int
    {
        return $this->cards->count();
    }
}
```