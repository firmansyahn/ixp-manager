<?php

/*
 * Copyright (c) 2024 Firmansyah Nainggolan
 * All Rights Reserved.
 *
 * This file is part of IXP Manager.
 *
 * IXP Manager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, version v2.0 of the License.
 *
 * IXP Manager is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GpNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License v2.0
 * along with IXP Manager.  If not, see:
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

return [

    'github' => [
        'url' => env('SOCIAL_GITHUB_URL', 'https://github.com/firmansyahn/ixp-manager'),
        'label' => env('SOCIAL_GITHUB_LABEL', 'IXP Manager @ GitHub'),
    ],

    'facebook' => [
        'url' => env('SOCIAL_FACEBOOK_URL', 'https://www.facebook.com/moratelindo'),
        'label' => env('SOCIAL_FACEBOOK_LABEL', 'IXP Manager @ GitHub'),
    ],

    'twitter' => [
        'url' => env('SOCIAL_TWITTER_URL', 'https://x.com/moratelindo'),
        'label' => env('SOCIAL_TWITTER_LABEL', 'IXP Manager @ GitHub'),
    ]
];