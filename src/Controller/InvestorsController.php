<?php
/*
 |------------------------------------------------------------------------------
 | Controller: Investors controller
 |------------------------------------------------------------------------------
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class InvestorsController extends AppController {
  
  public function index () {
    $investors = $this->Investors->find()->contain([
      'Comments',
      'Attachments',
      'CreatedBy',
      'ModifiedBy'
    ]);
    $this->set('investors', $investors);
  }
  
  public function read ($id = null) {
    
    $table = $this->Investors;
    
    $investor = $table->get($id, [
      'contain' => [
        'Accounts',
        'Comments',
        'Attachments',
        'CreatedBy',
        'ModifiedBy'
      ]
    ]);
    
    $accounts = $table->Accounts->find();
    
    $this->set('investor', $investor);
    $this->set('accounts', $accounts);
    
  }
  
  public function import () {
    
  }
  
  public function export () {
    
  }
  
  public function seedAccounts () {
    
    $investorsTable = $this->Investors;
    $accountsTable = $investorsTable->Accounts;
    
    $invesorAccounts = [
      [ 'investor_id' => 1, 'account_id' => 1 ],
      [ 'investor_id' => 2, 'account_id' => 2 ],
      [ 'investor_id' => 3, 'account_id' => 3 ],
      [ 'investor_id' => 4, 'account_id' => 4 ],
      [ 'investor_id' => 5, 'account_id' => 5 ],
      [ 'investor_id' => 6, 'account_id' => 6 ],
      [ 'investor_id' => 7, 'account_id' => 7 ],
      [ 'investor_id' => 8, 'account_id' => 8 ],
      [ 'investor_id' => 9, 'account_id' => 9 ],
      [ 'investor_id' => 10, 'account_id' => 10 ],
      [ 'investor_id' => 8, 'account_id' => 11 ],
      [ 'investor_id' => 11, 'account_id' => 12 ],
      [ 'investor_id' => 12, 'account_id' => 13 ],
      [ 'investor_id' => 13, 'account_id' => 14 ],
      [ 'investor_id' => 14, 'account_id' => 15 ],
      [ 'investor_id' => 13, 'account_id' => 16 ],
      [ 'investor_id' => 15, 'account_id' => 17 ],
      [ 'investor_id' => 16, 'account_id' => 18 ],
      [ 'investor_id' => 17, 'account_id' => 19 ],
      [ 'investor_id' => 18, 'account_id' => 20 ],
      [ 'investor_id' => 18, 'account_id' => 21 ],
      [ 'investor_id' => 18, 'account_id' => 22 ],
      [ 'investor_id' => 18, 'account_id' => 23 ],
      [ 'investor_id' => 19, 'account_id' => 24 ],
      [ 'investor_id' => 18, 'account_id' => 25 ],
      [ 'investor_id' => 20, 'account_id' => 26 ],
      [ 'investor_id' => 17, 'account_id' => 27 ],
      [ 'investor_id' => 21, 'account_id' => 28 ],
      [ 'investor_id' => 22, 'account_id' => 29 ],
      [ 'investor_id' => 23, 'account_id' => 30 ],
      [ 'investor_id' => 15, 'account_id' => 31 ],
      [ 'investor_id' => 23, 'account_id' => 32 ],
      [ 'investor_id' => 24, 'account_id' => 33 ],
      [ 'investor_id' => 10, 'account_id' => 34 ],
      [ 'investor_id' => 25, 'account_id' => 35 ],
      [ 'investor_id' => 26, 'account_id' => 36 ],
      [ 'investor_id' => 20, 'account_id' => 37 ],
      [ 'investor_id' => 23, 'account_id' => 38 ],
      [ 'investor_id' => 22, 'account_id' => 39 ],
      [ 'investor_id' => 27, 'account_id' => 40 ],
      [ 'investor_id' => 17, 'account_id' => 41 ],
      [ 'investor_id' => 28, 'account_id' => 42 ],
      [ 'investor_id' => 29, 'account_id' => 43 ],
      [ 'investor_id' => 30, 'account_id' => 44 ],
      [ 'investor_id' => 7, 'account_id' => 45 ],
      [ 'investor_id' => 31, 'account_id' => 46 ],
      [ 'investor_id' => 32, 'account_id' => 47 ],
      [ 'investor_id' => 33, 'account_id' => 48 ],
      [ 'investor_id' => 34, 'account_id' => 49 ],
      [ 'investor_id' => 35, 'account_id' => 50 ],
      [ 'investor_id' => 36, 'account_id' => 51 ],
      [ 'investor_id' => 37, 'account_id' => 52 ],
      [ 'investor_id' => 38, 'account_id' => 53 ],
      [ 'investor_id' => 12, 'account_id' => 54 ],
      [ 'investor_id' => 31, 'account_id' => 55 ],
      [ 'investor_id' => 39, 'account_id' => 56 ],
      [ 'investor_id' => 40, 'account_id' => 57 ],
      [ 'investor_id' => 41, 'account_id' => 58 ],
      [ 'investor_id' => 42, 'account_id' => 59 ],
      [ 'investor_id' => 43, 'account_id' => 60 ],
      [ 'investor_id' => 44, 'account_id' => 61 ],
      [ 'investor_id' => 45, 'account_id' => 62 ],
      [ 'investor_id' => 17, 'account_id' => 63 ],
      [ 'investor_id' => 46, 'account_id' => 64 ],
      [ 'investor_id' => 47, 'account_id' => 65 ],
      [ 'investor_id' => 48, 'account_id' => 66 ],
      [ 'investor_id' => 49, 'account_id' => 67 ],
      [ 'investor_id' => 50, 'account_id' => 68 ],
      [ 'investor_id' => 51, 'account_id' => 69 ],
      [ 'investor_id' => 52, 'account_id' => 70 ],
      [ 'investor_id' => 53, 'account_id' => 71 ],
      [ 'investor_id' => 54, 'account_id' => 72 ],
      [ 'investor_id' => 55, 'account_id' => 73 ],
      [ 'investor_id' => 56, 'account_id' => 74 ],
      [ 'investor_id' => 57, 'account_id' => 75 ],
      [ 'investor_id' => 31, 'account_id' => 76 ],
      [ 'investor_id' => 23, 'account_id' => 77 ],
      [ 'investor_id' => 22, 'account_id' => 78 ],
      [ 'investor_id' => 44, 'account_id' => 79 ],
      [ 'investor_id' => 15, 'account_id' => 80 ],
      [ 'investor_id' => 58, 'account_id' => 81 ],
      [ 'investor_id' => 15, 'account_id' => 82 ],
      [ 'investor_id' => 59, 'account_id' => 83 ],
      [ 'investor_id' => 60, 'account_id' => 84 ],
      [ 'investor_id' => 61, 'account_id' => 85 ],
      [ 'investor_id' => 62, 'account_id' => 86 ],
      [ 'investor_id' => 63, 'account_id' => 87 ],
      [ 'investor_id' => 64, 'account_id' => 88 ],
      [ 'investor_id' => 62, 'account_id' => 89 ],
      [ 'investor_id' => 65, 'account_id' => 90 ],
      [ 'investor_id' => 66, 'account_id' => 91 ],
      [ 'investor_id' => 47, 'account_id' => 92 ],
      [ 'investor_id' => 41, 'account_id' => 93 ],
      [ 'investor_id' => 36, 'account_id' => 94 ],
      [ 'investor_id' => 33, 'account_id' => 95 ],
      [ 'investor_id' => 32, 'account_id' => 96 ],
      [ 'investor_id' => 67, 'account_id' => 97 ],
      [ 'investor_id' => 68, 'account_id' => 98 ],
      [ 'investor_id' => 69, 'account_id' => 99 ],
      [ 'investor_id' => 70, 'account_id' => 100 ],
      [ 'investor_id' => 71, 'account_id' => 101 ],
      [ 'investor_id' => 72, 'account_id' => 102 ],
      [ 'investor_id' => 72, 'account_id' => 103 ],
      [ 'investor_id' => 34, 'account_id' => 104 ],
      [ 'investor_id' => 74, 'account_id' => 105 ],
      [ 'investor_id' => 75, 'account_id' => 106 ],
      [ 'investor_id' => 74, 'account_id' => 107 ],
      [ 'investor_id' => 41, 'account_id' => 108 ],
      [ 'investor_id' => 76, 'account_id' => 109 ],
      [ 'investor_id' => 77, 'account_id' => 110 ],
      [ 'investor_id' => 78, 'account_id' => 111 ],
      [ 'investor_id' => 28, 'account_id' => 112 ],
      [ 'investor_id' => 79, 'account_id' => 113 ],
      [ 'investor_id' => 80, 'account_id' => 114 ],
      [ 'investor_id' => 17, 'account_id' => 115 ],
      [ 'investor_id' => 81, 'account_id' => 116 ],
      [ 'investor_id' => 82, 'account_id' => 117 ],
      [ 'investor_id' => 83, 'account_id' => 118 ],
      [ 'investor_id' => 83, 'account_id' => 119 ],
      [ 'investor_id' => 83, 'account_id' => 120 ],
      [ 'investor_id' => 7, 'account_id' => 121 ],
      [ 'investor_id' => 9, 'account_id' => 122 ],
      [ 'investor_id' => 36, 'account_id' => 123 ],
      [ 'investor_id' => 20, 'account_id' => 124 ],
      [ 'investor_id' => 31, 'account_id' => 125 ],
      [ 'investor_id' => 31, 'account_id' => 126 ],
      [ 'investor_id' => 57, 'account_id' => 127 ],
      [ 'investor_id' => 84, 'account_id' => 128 ],
      [ 'investor_id' => 85, 'account_id' => 129 ],
      [ 'investor_id' => 31, 'account_id' => 130 ],
      [ 'investor_id' => 86, 'account_id' => 131 ],
      [ 'investor_id' => 39, 'account_id' => 132 ],
      [ 'investor_id' => 87, 'account_id' => 133 ],
      [ 'investor_id' => 88, 'account_id' => 134 ],
      [ 'investor_id' => 89, 'account_id' => 135 ],
      [ 'investor_id' => 90, 'account_id' => 136 ],
      [ 'investor_id' => 70, 'account_id' => 137 ],
      [ 'investor_id' => 91, 'account_id' => 138 ],
      [ 'investor_id' => 71, 'account_id' => 139 ],
      [ 'investor_id' => 92, 'account_id' => 140 ],
      [ 'investor_id' => 36, 'account_id' => 141 ],
      [ 'investor_id' => 93, 'account_id' => 142 ],
      [ 'investor_id' => 94, 'account_id' => 143 ],
      [ 'investor_id' => 15, 'account_id' => 144 ],
      [ 'investor_id' => 95, 'account_id' => 145 ],
      [ 'investor_id' => 86, 'account_id' => 146 ],
      [ 'investor_id' => 96, 'account_id' => 147 ],
      [ 'investor_id' => 97, 'account_id' => 148 ],
      [ 'investor_id' => 98, 'account_id' => 149 ],
      [ 'investor_id' => 21, 'account_id' => 150 ],
      [ 'investor_id' => 99, 'account_id' => 151 ],
      [ 'investor_id' => 72, 'account_id' => 152 ],
      [ 'investor_id' => 100, 'account_id' => 153 ],
      [ 'investor_id' => 101, 'account_id' => 154 ],
      [ 'investor_id' => 15, 'account_id' => 155 ],
      [ 'investor_id' => 102, 'account_id' => 156 ],
      [ 'investor_id' => 39, 'account_id' => 157 ],
      [ 'investor_id' => 103, 'account_id' => 158 ],
      [ 'investor_id' => 104, 'account_id' => 159 ],
      [ 'investor_id' => 44, 'account_id' => 160 ],
      [ 'investor_id' => 44, 'account_id' => 161 ],
      [ 'investor_id' => 105, 'account_id' => 162 ],
      [ 'investor_id' => 105, 'account_id' => 163 ],
      [ 'investor_id' => 106, 'account_id' => 164 ],
      [ 'investor_id' => 107, 'account_id' => 165 ],
      [ 'investor_id' => 108, 'account_id' => 166 ],
      [ 'investor_id' => 109, 'account_id' => 167 ],
      [ 'investor_id' => 22, 'account_id' => 168 ],
      [ 'investor_id' => 110, 'account_id' => 169 ],
      [ 'investor_id' => 111, 'account_id' => 170 ],
      [ 'investor_id' => 23, 'account_id' => 171 ],
      [ 'investor_id' => 112, 'account_id' => 172 ],
      [ 'investor_id' => 13, 'account_id' => 173 ],
      [ 'investor_id' => 113, 'account_id' => 174 ],
      [ 'investor_id' => 114, 'account_id' => 175 ],
      [ 'investor_id' => 115, 'account_id' => 176 ],
      [ 'investor_id' => 116, 'account_id' => 177 ],
      [ 'investor_id' => 117, 'account_id' => 178 ],
      [ 'investor_id' => 118, 'account_id' => 179 ],
      [ 'investor_id' => 119, 'account_id' => 180 ],
      [ 'investor_id' => 120, 'account_id' => 181 ],
      [ 'investor_id' => 71, 'account_id' => 182 ],
      [ 'investor_id' => 121, 'account_id' => 183 ],
      [ 'investor_id' => 107, 'account_id' => 184 ],
      [ 'investor_id' => 122, 'account_id' => 185 ],
      [ 'investor_id' => 123, 'account_id' => 186 ],
      [ 'investor_id' => 124, 'account_id' => 187 ],
      [ 'investor_id' => 125, 'account_id' => 188 ],
      [ 'investor_id' => 113, 'account_id' => 189 ],
      [ 'investor_id' => 6, 'account_id' => 190 ],
      [ 'investor_id' => 31, 'account_id' => 191 ],
      [ 'investor_id' => 126, 'account_id' => 192 ],
      [ 'investor_id' => 56, 'account_id' => 193 ],
      [ 'investor_id' => 127, 'account_id' => 194 ],
      [ 'investor_id' => 128, 'account_id' => 195 ],
      [ 'investor_id' => 129, 'account_id' => 196 ],
      [ 'investor_id' => 130, 'account_id' => 197 ],
      [ 'investor_id' => 83, 'account_id' => 198 ],
      [ 'investor_id' => 34, 'account_id' => 199 ],
      [ 'investor_id' => 131, 'account_id' => 200 ],
      [ 'investor_id' => 132, 'account_id' => 201 ],
      [ 'investor_id' => 59, 'account_id' => 202 ],
      [ 'investor_id' => 57, 'account_id' => 203 ],
      [ 'investor_id' => 6, 'account_id' => 204 ],
      [ 'investor_id' => 133, 'account_id' => 205 ],
      [ 'investor_id' => 134, 'account_id' => 206 ],
      [ 'investor_id' => 135, 'account_id' => 207 ],
      [ 'investor_id' => 136, 'account_id' => 208 ],
      [ 'investor_id' => 137, 'account_id' => 209 ],
      [ 'investor_id' => 138, 'account_id' => 210 ],
      [ 'investor_id' => 81, 'account_id' => 211 ],
      [ 'investor_id' => 83, 'account_id' => 212 ],
      [ 'investor_id' => 78, 'account_id' => 213 ],
      [ 'investor_id' => 62, 'account_id' => 214 ],
      [ 'investor_id' => 62, 'account_id' => 215 ],
      [ 'investor_id' => 66, 'account_id' => 216 ],
      [ 'investor_id' => 139, 'account_id' => 217 ],
      [ 'investor_id' => 140, 'account_id' => 218 ],
      [ 'investor_id' => 141, 'account_id' => 219 ],
      [ 'investor_id' => 78, 'account_id' => 220 ],
      [ 'investor_id' => 78, 'account_id' => 221 ],
      [ 'investor_id' => 142, 'account_id' => 222 ],
      [ 'investor_id' => 143, 'account_id' => 223 ],
      [ 'investor_id' => 144, 'account_id' => 224 ],
      [ 'investor_id' => 84, 'account_id' => 225 ],
      [ 'investor_id' => 130, 'account_id' => 226 ],
      [ 'investor_id' => 65, 'account_id' => 227 ],
      [ 'investor_id' => 145, 'account_id' => 228 ],
      [ 'investor_id' => 141, 'account_id' => 229 ],
      [ 'investor_id' => 146, 'account_id' => 230 ],
      [ 'investor_id' => 147, 'account_id' => 231 ],
      [ 'investor_id' => 146, 'account_id' => 232 ],
      [ 'investor_id' => 148, 'account_id' => 233 ],
      [ 'investor_id' => 149, 'account_id' => 234 ],
      [ 'investor_id' => 150, 'account_id' => 235 ],
      [ 'investor_id' => 68, 'account_id' => 236 ],
      [ 'investor_id' => 151, 'account_id' => 237 ],
      [ 'investor_id' => 152, 'account_id' => 238 ],
      [ 'investor_id' => 153, 'account_id' => 239 ],
      [ 'investor_id' => 154, 'account_id' => 240 ],
      [ 'investor_id' => 59, 'account_id' => 241 ],
      [ 'investor_id' => 71, 'account_id' => 242 ],
      [ 'investor_id' => 114, 'account_id' => 243 ],
      [ 'investor_id' => 15, 'account_id' => 244 ],
      [ 'investor_id' => 155, 'account_id' => 245 ],
      [ 'investor_id' => 156, 'account_id' => 246 ],
      [ 'investor_id' => 67, 'account_id' => 247 ],
      [ 'investor_id' => 120, 'account_id' => 248 ],
      [ 'investor_id' => 29, 'account_id' => 249 ],
      [ 'investor_id' => 13, 'account_id' => 250 ],
      [ 'investor_id' => 113, 'account_id' => 251 ],
      [ 'investor_id' => 22, 'account_id' => 252 ],
      [ 'investor_id' => 60, 'account_id' => 253 ],
      [ 'investor_id' => 157, 'account_id' => 254 ],
      [ 'investor_id' => 158, 'account_id' => 255 ],
      [ 'investor_id' => 107, 'account_id' => 256 ],
      [ 'investor_id' => 31, 'account_id' => 257 ],
      [ 'investor_id' => 4, 'account_id' => 258 ],
      [ 'investor_id' => 91, 'account_id' => 259 ],
      [ 'investor_id' => 159, 'account_id' => 260 ],
      [ 'investor_id' => 63, 'account_id' => 261 ],
      [ 'investor_id' => 64, 'account_id' => 262 ],
      [ 'investor_id' => 121, 'account_id' => 263 ],
      [ 'investor_id' => 31, 'account_id' => 264 ],
      [ 'investor_id' => 160, 'account_id' => 265 ],
      [ 'investor_id' => 161, 'account_id' => 266 ],
      [ 'investor_id' => 6, 'account_id' => 267 ],
      [ 'investor_id' => 6, 'account_id' => 268 ],
      [ 'investor_id' => 69, 'account_id' => 269 ],
      [ 'investor_id' => 73, 'account_id' => 270 ],
      [ 'investor_id' => 7, 'account_id' => 271 ],
      [ 'investor_id' => 23, 'account_id' => 272 ],
      [ 'investor_id' => 162, 'account_id' => 273 ],
      [ 'investor_id' => 3, 'account_id' => 274 ],
      [ 'investor_id' => 21, 'account_id' => 275 ],
      [ 'investor_id' => 3, 'account_id' => 276 ],
      [ 'investor_id' => 163, 'account_id' => 277 ],
      [ 'investor_id' => 119, 'account_id' => 278 ],
      [ 'investor_id' => 164, 'account_id' => 279 ],
      [ 'investor_id' => 165, 'account_id' => 280 ],
      [ 'investor_id' => 2, 'account_id' => 281 ],
      [ 'investor_id' => 52, 'account_id' => 282 ],
      [ 'investor_id' => 53, 'account_id' => 283 ],
      [ 'investor_id' => 166, 'account_id' => 284 ],
      [ 'investor_id' => 11, 'account_id' => 285 ],
      [ 'investor_id' => 167, 'account_id' => 286 ],
      [ 'investor_id' => 168, 'account_id' => 287 ],
      [ 'investor_id' => 169, 'account_id' => 288 ],
      [ 'investor_id' => 146, 'account_id' => 289 ],
      [ 'investor_id' => 170, 'account_id' => 290 ],
      [ 'investor_id' => 171, 'account_id' => 291 ],
      [ 'investor_id' => 41, 'account_id' => 292 ],
      [ 'investor_id' => 172, 'account_id' => 293 ],
      [ 'investor_id' => 13, 'account_id' => 294 ],
      [ 'investor_id' => 106, 'account_id' => 295 ],
      [ 'investor_id' => 118, 'account_id' => 296 ],
      [ 'investor_id' => 141, 'account_id' => 297 ],
      [ 'investor_id' => 96, 'account_id' => 298 ],
      [ 'investor_id' => 173, 'account_id' => 299 ],
      [ 'investor_id' => 174, 'account_id' => 300 ],
      [ 'investor_id' => 124, 'account_id' => 301 ],
      [ 'investor_id' => 175, 'account_id' => 302 ],
      [ 'investor_id' => 17, 'account_id' => 303 ],
      [ 'investor_id' => 176, 'account_id' => 304 ],
      [ 'investor_id' => 126, 'account_id' => 305 ],
      [ 'investor_id' => 177, 'account_id' => 306 ],
      [ 'investor_id' => 79, 'account_id' => 307 ],
      [ 'investor_id' => 178, 'account_id' => 308 ],
      [ 'investor_id' => 179, 'account_id' => 309 ],
      [ 'investor_id' => 179, 'account_id' => 310 ],
      [ 'investor_id' => 94, 'account_id' => 311 ],
      [ 'investor_id' => 180, 'account_id' => 312 ],
      [ 'investor_id' => 145, 'account_id' => 313 ],
      [ 'investor_id' => 181, 'account_id' => 314 ],
      [ 'investor_id' => 182, 'account_id' => 315 ],
      [ 'investor_id' => 183, 'account_id' => 316 ],
      [ 'investor_id' => 184, 'account_id' => 317 ],
      [ 'investor_id' => 185, 'account_id' => 318 ],
      [ 'investor_id' => 186, 'account_id' => 319 ],
      [ 'investor_id' => 187, 'account_id' => 320 ],
      [ 'investor_id' => 83, 'account_id' => 321 ],
      [ 'investor_id' => 133, 'account_id' => 322 ],
      [ 'investor_id' => 188, 'account_id' => 323 ],
      [ 'investor_id' => 188, 'account_id' => 324 ],
      [ 'investor_id' => 71, 'account_id' => 325 ],
      [ 'investor_id' => 189, 'account_id' => 326 ],
      [ 'investor_id' => 59, 'account_id' => 327 ],
      [ 'investor_id' => 190, 'account_id' => 328 ],
      [ 'investor_id' => 191, 'account_id' => 329 ],
      [ 'investor_id' => 191, 'account_id' => 330 ],
      [ 'investor_id' => 154, 'account_id' => 331 ],
      [ 'investor_id' => 141, 'account_id' => 332 ],
      [ 'investor_id' => 173, 'account_id' => 333 ],
      [ 'investor_id' => 94, 'account_id' => 334 ],
      [ 'investor_id' => 31, 'account_id' => 335 ],
      [ 'investor_id' => 31, 'account_id' => 336 ],
      [ 'investor_id' => 192, 'account_id' => 337 ],
      [ 'investor_id' => 193, 'account_id' => 338 ],
      [ 'investor_id' => 148, 'account_id' => 339 ],
      [ 'investor_id' => 12, 'account_id' => 340 ],
      [ 'investor_id' => 60, 'account_id' => 341 ],
      [ 'investor_id' => 185, 'account_id' => 342 ],
      [ 'investor_id' => 194, 'account_id' => 343 ],
      [ 'investor_id' => 195, 'account_id' => 344 ],
      [ 'investor_id' => 117, 'account_id' => 345 ],
      [ 'investor_id' => 173, 'account_id' => 346 ],
      [ 'investor_id' => 196, 'account_id' => 347 ],
      [ 'investor_id' => 180, 'account_id' => 348 ],
      [ 'investor_id' => 83, 'account_id' => 349 ],
      [ 'investor_id' => 31, 'account_id' => 350 ],
      [ 'investor_id' => 197, 'account_id' => 351 ],
      [ 'investor_id' => 198, 'account_id' => 352 ],
      [ 'investor_id' => 199, 'account_id' => 353 ],
      [ 'investor_id' => 200, 'account_id' => 354 ],
      [ 'investor_id' => 101, 'account_id' => 355 ],
      [ 'investor_id' => 201, 'account_id' => 356 ],
      [ 'investor_id' => 201, 'account_id' => 357 ],
      [ 'investor_id' => 112, 'account_id' => 358 ],
      [ 'investor_id' => 202, 'account_id' => 359 ],
      [ 'investor_id' => 203, 'account_id' => 360 ],
      [ 'investor_id' => 204, 'account_id' => 361 ],
      [ 'investor_id' => 189, 'account_id' => 362 ],
      [ 'investor_id' => 205, 'account_id' => 363 ],
      [ 'investor_id' => 206, 'account_id' => 364 ],
      [ 'investor_id' => 114, 'account_id' => 365 ],
      [ 'investor_id' => 96, 'account_id' => 366 ],
      [ 'investor_id' => 44, 'account_id' => 367 ],
      [ 'investor_id' => 175, 'account_id' => 368 ],
      [ 'investor_id' => 207, 'account_id' => 369 ],
      [ 'investor_id' => 208, 'account_id' => 370 ],
      [ 'investor_id' => 127, 'account_id' => 371 ],
      [ 'investor_id' => 209, 'account_id' => 372 ],
      [ 'investor_id' => 97, 'account_id' => 373 ],
      [ 'investor_id' => 210, 'account_id' => 374 ],
      [ 'investor_id' => 210, 'account_id' => 375 ],
      [ 'investor_id' => 211, 'account_id' => 376 ],
      [ 'investor_id' => 210, 'account_id' => 377 ],
      [ 'investor_id' => 210, 'account_id' => 378 ],
      [ 'investor_id' => 212, 'account_id' => 379 ],
      [ 'investor_id' => 213, 'account_id' => 380 ],
      [ 'investor_id' => 214, 'account_id' => 381 ],
      [ 'investor_id' => 28, 'account_id' => 382 ],
      [ 'investor_id' => 215, 'account_id' => 383 ],
      [ 'investor_id' => 216, 'account_id' => 384 ],
      [ 'investor_id' => 189, 'account_id' => 385 ],
      [ 'investor_id' => 172, 'account_id' => 386 ],
      [ 'investor_id' => 217, 'account_id' => 387 ],
      [ 'investor_id' => 218, 'account_id' => 388 ],
      [ 'investor_id' => 210, 'account_id' => 389 ],
      [ 'investor_id' => 219, 'account_id' => 390 ],
      [ 'investor_id' => 210, 'account_id' => 391 ],
      [ 'investor_id' => 220, 'account_id' => 392 ],
      [ 'investor_id' => 169, 'account_id' => 393 ],
      [ 'investor_id' => 171, 'account_id' => 394 ],
    ];
    
    foreach ($invesorAccounts as $invesorAccount) {
      $investorId = $invesorAccount['investor_id'];
      $accountId = $invesorAccount['account_id'];
      $investor = $investorsTable->get($investorId);
      $account = $accountsTable->get($accountId);
      $accountsTable->link($investor, [$account]);
    }
    
  }
  
  public function beforeFilter (Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny();
    $this->Auth->allow([]);
  }
  
  public function isAuthorized ($user = null) {
    return true;
  }
  
}