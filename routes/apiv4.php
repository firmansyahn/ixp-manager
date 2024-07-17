<?php

/*
 * Copyright (C) 2009 - 2021 Internet Neutral Exchange Association Company Limited By Guarantee.
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

use Illuminate\Support\Env;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api/v4" middleware group. Enjoy building your API!
|
*/

// API key can be passed in the header (preferred) or on the URL.
//
//     curl -X GET -H "X-IXP-Manager-API-Key: mySuperSecretApiKey" http://ixpv.dev/api/v4/test
//     wget http://ixpv.dev/api/v4/test?apikey=mySuperSecretApiKey

Route::get('ping', [IXP\Http\Controllers\Api\V4\PublicController::class], 'ping')->name('api-v4:ping' );
Route::get('test', [IXP\Http\Controllers\Api\V4\PublicController::class], 'test')->name('api-v4:test' );


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// IX-F Member List Export
Route::controller(IXP\Http\Controllers\Api\V4\MemberExportController::class)
    ->prefix('member-export')
    ->group(function() {
        Route::get('ixf',           'ixf')->name('ixf-member-export');
        Route::get('ixf/{version}', 'ixf');
});


// https://www.ixpmanager.org/js/ixp-manager-users.json
Route::get( 'ixpmanager-users/ixf-ids', function() {
    return response()->json( Cache::remember('ixpmanager-users/ixf-ids', 120, function() {
        $ixfids = [];
        if( $ixps = file_get_contents( 'https://www.ixpmanager.org/js/ixp-manager-users.json' ) ) {
            foreach( json_decode( $ixps, false )->ixp_list as $ix ) {
                if( $ix->ixf_id ) {
                    $ixfids[] = $ix->ixf_id;
                }
            }
        }

        return $ixfids;
    }));
})->name( 'ixpmanager-users/ixf-ids' );



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Statistics
//
// get overall stats by month as a JSON response
Route::get('statistics/overall-by-month', [IXP\Http\Controllers\Api\V4\StatisticsController::class], 'overallByMonth');
