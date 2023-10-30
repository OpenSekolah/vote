<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ParseColors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:colors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse Colors';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array = array (
            'slate' => 
            array (
              50 => 
              array (
                'hex_code' => '#f8fafc',
                'rgb_code' => 'rgb(248,250,252)',
                'hsl_code' => 'hsl(210,40%,98%)',
              ),
              100 => 
              array (
                'hex_code' => '#f1f5f9',
                'rgb_code' => 'rgb(241,245,249)',
                'hsl_code' => 'hsl(210,40%,96.1%)',
              ),
              200 => 
              array (
                'hex_code' => '#e2e8f0',
                'rgb_code' => 'rgb(226,232,240)',
                'hsl_code' => 'hsl(214.3,31.8%,91.4%)',
              ),
              300 => 
              array (
                'hex_code' => '#cbd5e1',
                'rgb_code' => 'rgb(203,213,225)',
                'hsl_code' => 'hsl(212.7,26.8%,83.9',
              ),
              400 => 
              array (
                'hex_code' => '#94a3b8',
                'rgb_code' => 'rgb(148,163,184)',
                'hsl_code' => 'hsl(215,20.2%,65.1%)',
              ),
              500 => 
              array (
                'hex_code' => '#64748b',
                'rgb_code' => 'rgb(100,116,139)',
                'hsl_code' => 'hsl(215.4,16.3%,46.9%)',
              ),
              600 => 
              array (
                'hex_code' => '#475569',
                'rgb_code' => 'rgb(71,85,105)',
                'hsl_code' => 'hsl(215.3,19.3%,34.5%)',
              ),
              700 => 
              array (
                'hex_code' => '#334155',
                'rgb_code' => 'rgb(51,65,85)',
                'hsl_code' => 'hsl(215.3,25%,26.7%)',
              ),
              800 => 
              array (
                'hex_code' => '#1e293b',
                'rgb_code' => 'rgb(30,41,59)',
                'hsl_code' => 'hsl(217.2,32.6%,17.5%)',
              ),
              900 => 
              array (
                'hex_code' => '#0f172a',
                'rgb_code' => 'rgb(15,23,42)',
                'hsl_code' => 'hsl(222.2,47.4%,11.2%)',
              ),
            ),
            'gray' => 
            array (
              50 => 
              array (
                'hex_code' => '#f9fafb',
                'rgb_code' => 'rgb(249,250,251)',
                'hsl_code' => 'hsl(210,20%,98%)',
              ),
              100 => 
              array (
                'hex_code' => '#f3f4f6',
                'rgb_code' => 'rgb(243,244,246)',
                'hsl_code' => 'hsl(220,14.3%,95.9%)',
              ),
              200 => 
              array (
                'hex_code' => '#e5e7eb',
                'rgb_code' => 'rgb(229,231,235)',
                'hsl_code' => 'hsl(220,13%,91%)',
              ),
              300 => 
              array (
                'hex_code' => '#d1d5db',
                'rgb_code' => 'rgb(209,213,219)',
                'hsl_code' => 'hsl(216,12.2%,83.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#9ca3af',
                'rgb_code' => 'rgb(156,163,175)',
                'hsl_code' => 'hsl(217.9,10.6%,64.9%)',
              ),
              500 => 
              array (
                'hex_code' => '#6b7280',
                'rgb_code' => 'rgb(107,114,128)',
                'hsl_code' => 'hsl(220,8.9%,46.1%)',
              ),
              600 => 
              array (
                'hex_code' => '#4b5563',
                'rgb_code' => 'rgb(75,85,99)',
                'hsl_code' => 'hsl(215,13.8%,34.1%)',
              ),
              700 => 
              array (
                'hex_code' => '#374151',
                'rgb_code' => 'rgb(55,65,81)',
                'hsl_code' => 'hsl(216.9,19.1%,26.7%)',
              ),
              800 => 
              array (
                'hex_code' => '#1f2937',
                'rgb_code' => 'rgb(31,41,55)',
                'hsl_code' => 'hsl(215,27.9%,16.9%)',
              ),
              900 => 
              array (
                'hex_code' => '#111827',
                'rgb_code' => 'rgb(17,24,39)',
                'hsl_code' => 'hsl(220.9,39.3%,11%)',
              ),
            ),
            'zinc' => 
            array (
              50 => 
              array (
                'hex_code' => '#fafafa',
                'rgb_code' => 'rgb(250,250,250)',
                'hsl_code' => 'hsl(0,0%,98%)',
              ),
              100 => 
              array (
                'hex_code' => '#f4f4f5',
                'rgb_code' => 'rgb(244,244,245)',
                'hsl_code' => 'hsl(240,4.8%,95.9%)',
              ),
              200 => 
              array (
                'hex_code' => '#e4e4e7',
                'rgb_code' => 'rgb(228,228,231)',
                'hsl_code' => 'hsl(240,5.9%,90%)',
              ),
              300 => 
              array (
                'hex_code' => '#d4d4d8',
                'rgb_code' => 'rgb(212,212,216)',
                'hsl_code' => 'hsl(240,4.9%,83.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#a1a1aa',
                'rgb_code' => 'rgb(161,161,170)',
                'hsl_code' => 'hsl(240,5%,64.9%)',
              ),
              500 => 
              array (
                'hex_code' => '#71717a',
                'rgb_code' => 'rgb(113,113,122)',
                'hsl_code' => 'hsl(240,3.8%,46.1%)',
              ),
              600 => 
              array (
                'hex_code' => '#52525b',
                'rgb_code' => 'rgb(82,82,91)',
                'hsl_code' => 'hsl(240,5.2%,33.9%)',
              ),
              700 => 
              array (
                'hex_code' => '#3f3f46',
                'rgb_code' => 'rgb(63,63,70)',
                'hsl_code' => 'hsl(240,5.3%,26.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#27272a',
                'rgb_code' => 'rgb(39,39,42)',
                'hsl_code' => 'hsl(240,3.7%,15.9%)',
              ),
              900 => 
              array (
                'hex_code' => '#18181b',
                'rgb_code' => 'rgb(24,24,27)',
                'hsl_code' => 'hsl(240,5.9%,10%)',
              ),
            ),
            'neutral' => 
            array (
              50 => 
              array (
                'hex_code' => '#fafafa',
                'rgb_code' => 'rgb(250,250,250)',
                'hsl_code' => 'hsl(0,0%,98%)',
              ),
              100 => 
              array (
                'hex_code' => '#f5f5f5',
                'rgb_code' => 'rgb(245,245,245)',
                'hsl_code' => 'hsl(0,0%,96.1%)',
              ),
              200 => 
              array (
                'hex_code' => '#e5e5e5',
                'rgb_code' => 'rgb(229,229,229)',
                'hsl_code' => 'hsl(0,0%,89.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#d4d4d4',
                'rgb_code' => 'rgb(212,212,212)',
                'hsl_code' => 'hsl(0,0%,83.1%)',
              ),
              400 => 
              array (
                'hex_code' => '#a3a3a3',
                'rgb_code' => 'rgb(163,163,163)',
                'hsl_code' => 'hsl(0,0%,63.9%)',
              ),
              500 => 
              array (
                'hex_code' => '#737373',
                'rgb_code' => 'rgb(115,115,115)',
                'hsl_code' => 'hsl(0,0%,45.1%)',
              ),
              600 => 
              array (
                'hex_code' => '#525252',
                'rgb_code' => 'rgb(82,82,82)',
                'hsl_code' => 'hsl(0,0%,32.2%)',
              ),
              700 => 
              array (
                'hex_code' => '#404040',
                'rgb_code' => 'rgb(64,64,64)',
                'hsl_code' => 'hsl(0,0%,25.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#262626',
                'rgb_code' => 'rgb(38,38,38)',
                'hsl_code' => 'hsl(0,0%,14.9%)',
              ),
              900 => 
              array (
                'hex_code' => '#171717',
                'rgb_code' => 'rgb(23,23,23)',
                'hsl_code' => 'hsl(0,0%,9%)',
              ),
            ),
            'stone' => 
            array (
              50 => 
              array (
                'hex_code' => '#fafaf9',
                'rgb_code' => 'rgb(250,250,249)',
                'hsl_code' => 'hsl(60,9.1%,97.8%)',
              ),
              100 => 
              array (
                'hex_code' => '#f5f5f4',
                'rgb_code' => 'rgb(245,245,244)',
                'hsl_code' => 'hsl(60,4.8%,95.9%)',
              ),
              200 => 
              array (
                'hex_code' => '#e7e5e4',
                'rgb_code' => 'rgb(231,229,228)',
                'hsl_code' => 'hsl(20,5.9%,90%)',
              ),
              300 => 
              array (
                'hex_code' => '#d6d3d1',
                'rgb_code' => 'rgb(214,211,209)',
                'hsl_code' => 'hsl(24,5.7%,82.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#a8a29e',
                'rgb_code' => 'rgb(168,162,158)',
                'hsl_code' => 'hsl(24,5.4%,63.9%)',
              ),
              500 => 
              array (
                'hex_code' => '#78716c',
                'rgb_code' => 'rgb(120,113,108)',
                'hsl_code' => 'hsl(25,5.3%,44.7%)',
              ),
              600 => 
              array (
                'hex_code' => '#57534e',
                'rgb_code' => 'rgb(87,83,78)',
                'hsl_code' => 'hsl(33.3,5.5%,32.4%)',
              ),
              700 => 
              array (
                'hex_code' => '#44403c',
                'rgb_code' => 'rgb(68,64,60)',
                'hsl_code' => 'hsl(30,6.3%,25.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#292524',
                'rgb_code' => 'rgb(41,37,36)',
                'hsl_code' => 'hsl(12,6.5%,15.1%)',
              ),
              900 => 
              array (
                'hex_code' => '#1c1917',
                'rgb_code' => 'rgb(28,25,23)',
                'hsl_code' => 'hsl(24,9.8%,10%)',
              ),
            ),
            'red' => 
            array (
              50 => 
              array (
                'hex_code' => '#fef2f2',
                'rgb_code' => 'rgb(254,242,242)',
                'hsl_code' => 'hsl(0,85.7%,97.3%)',
              ),
              100 => 
              array (
                'hex_code' => '#fee2e2',
                'rgb_code' => 'rgb(254,226,226)',
                'hsl_code' => 'hsl(0,93.3%,94.1%)',
              ),
              200 => 
              array (
                'hex_code' => '#fecaca',
                'rgb_code' => 'rgb(254,202,202)',
                'hsl_code' => 'hsl(0,96.3%,89.4%)',
              ),
              300 => 
              array (
                'hex_code' => '#fca5a5',
                'rgb_code' => 'rgb(252,165,165)',
                'hsl_code' => 'hsl(0,93.5%,81.8%)',
              ),
              400 => 
              array (
                'hex_code' => '#f87171',
                'rgb_code' => 'rgb(248,113,113)',
                'hsl_code' => 'hsl(0,90.6%,70.8%)',
              ),
              500 => 
              array (
                'hex_code' => '#ef4444',
                'rgb_code' => 'rgb(239,68,68)',
                'hsl_code' => 'hsl(0,84.2%,60.2%)',
              ),
              600 => 
              array (
                'hex_code' => '#dc2626',
                'rgb_code' => 'rgb(220,38,38)',
                'hsl_code' => 'hsl(0,72.2%,50.6%)',
              ),
              700 => 
              array (
                'hex_code' => '#b91c1c',
                'rgb_code' => 'rgb(185,28,28)',
                'hsl_code' => 'hsl(0,73.7%,41.8%)',
              ),
              800 => 
              array (
                'hex_code' => '#991b1b',
                'rgb_code' => 'rgb(153,27,27)',
                'hsl_code' => 'hsl(0,70%,35.3%)',
              ),
              900 => 
              array (
                'hex_code' => '#7f1d1d',
                'rgb_code' => 'rgb(127,29,29)',
                'hsl_code' => 'hsl(0,62.8%,30.6%)',
              ),
            ),
            'orange' => 
            array (
              50 => 
              array (
                'hex_code' => '#fff7ed',
                'rgb_code' => 'rgb(255,247,237)',
                'hsl_code' => 'hsl(33.3,100%,96.5%)',
              ),
              100 => 
              array (
                'hex_code' => '#ffedd5',
                'rgb_code' => 'rgb(255,237,213)',
                'hsl_code' => 'hsl(34.3,100%,91.8%)',
              ),
              200 => 
              array (
                'hex_code' => '#fed7aa',
                'rgb_code' => 'rgb(254,215,170)',
                'hsl_code' => 'hsl(32.1,97.7%,83.1%)',
              ),
              300 => 
              array (
                'hex_code' => '#fdba74',
                'rgb_code' => 'rgb(253,186,116)',
                'hsl_code' => 'hsl(30.7,97.2%,72.4%)',
              ),
              400 => 
              array (
                'hex_code' => '#fb923c',
                'rgb_code' => 'rgb(251,146,60)',
                'hsl_code' => 'hsl(27,96%,61%)',
              ),
              500 => 
              array (
                'hex_code' => '#f97316',
                'rgb_code' => 'rgb(249,115,22)',
                'hsl_code' => 'hsl(24.6,95%,53.1%)',
              ),
              600 => 
              array (
                'hex_code' => '#ea580c',
                'rgb_code' => 'rgb(234,88,12)',
                'hsl_code' => 'hsl(20.5,90.2%,48.2%)',
              ),
              700 => 
              array (
                'hex_code' => '#c2410c',
                'rgb_code' => 'rgb(194,65,12)',
                'hsl_code' => 'hsl(17.5,88.3%,40.4%)',
              ),
              800 => 
              array (
                'hex_code' => '#9a3412',
                'rgb_code' => 'rgb(154,52,18)',
                'hsl_code' => 'hsl(15,79.1%,33.7%)',
              ),
              900 => 
              array (
                'hex_code' => '#7c2d12',
                'rgb_code' => 'rgb(124,45,18)',
                'hsl_code' => 'hsl(15.3,74.6%,27.8%)',
              ),
            ),
            'amber' => 
            array (
              50 => 
              array (
                'hex_code' => '#fffbeb',
                'rgb_code' => 'rgb(255,251,235)',
                'hsl_code' => 'hsl(48,100%,96.1%)',
              ),
              100 => 
              array (
                'hex_code' => '#fef3c7',
                'rgb_code' => 'rgb(254,243,199)',
                'hsl_code' => 'hsl(48,96.5%,88.8%)',
              ),
              200 => 
              array (
                'hex_code' => '#fde68a',
                'rgb_code' => 'rgb(253,230,138)',
                'hsl_code' => 'hsl(48,96.6%,76.7%)',
              ),
              300 => 
              array (
                'hex_code' => '#fcd34d',
                'rgb_code' => 'rgb(252,211,77)',
                'hsl_code' => 'hsl(45.9,96.7%,64.5%)',
              ),
              400 => 
              array (
                'hex_code' => '#fbbf24',
                'rgb_code' => 'rgb(251,191,36)',
                'hsl_code' => 'hsl(43.3,96.4%,56.3%)',
              ),
              500 => 
              array (
                'hex_code' => '#f59e0b',
                'rgb_code' => 'rgb(245,158,11)',
                'hsl_code' => 'hsl(37.7,92.1%,50.2%)',
              ),
              600 => 
              array (
                'hex_code' => '#d97706',
                'rgb_code' => 'rgb(217,119,6)',
                'hsl_code' => 'hsl(32.1,94.6%,43.7%)',
              ),
              700 => 
              array (
                'hex_code' => '#b45309',
                'rgb_code' => 'rgb(180,83,9)',
                'hsl_code' => 'hsl(26,90.5%,37.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#92400e',
                'rgb_code' => 'rgb(146,64,14)',
                'hsl_code' => 'hsl(22.7,82.5%,31.4%)',
              ),
              900 => 
              array (
                'hex_code' => '#78350f',
                'rgb_code' => 'rgb(120,53,15)',
                'hsl_code' => 'hsl(21.7,77.8%,26.5%)',
              ),
            ),
            'yellow' => 
            array (
              50 => 
              array (
                'hex_code' => '#fefce8',
                'rgb_code' => 'rgb(254,252,232)',
                'hsl_code' => 'hsl(54.5,91.7%,95.3%)',
              ),
              100 => 
              array (
                'hex_code' => '#fef9c3',
                'rgb_code' => 'rgb(254,249,195)',
                'hsl_code' => 'hsl(54.9,96.7%,88%)',
              ),
              200 => 
              array (
                'hex_code' => '#fef08a',
                'rgb_code' => 'rgb(254,240,138)',
                'hsl_code' => 'hsl(52.8,98.3%,76.9%)',
              ),
              300 => 
              array (
                'hex_code' => '#fde047',
                'rgb_code' => 'rgb(253,224,71)',
                'hsl_code' => 'hsl(50.4,97.8%,63.5%)',
              ),
              400 => 
              array (
                'hex_code' => '#facc15',
                'rgb_code' => 'rgb(250,204,21)',
                'hsl_code' => 'hsl(47.9,95.8%,53.1%)',
              ),
              500 => 
              array (
                'hex_code' => '#eab308',
                'rgb_code' => 'rgb(234,179,8)',
                'hsl_code' => 'hsl(45.4,93.4%,47.5%)',
              ),
              600 => 
              array (
                'hex_code' => '#ca8a04',
                'rgb_code' => 'rgb(202,138,4)',
                'hsl_code' => 'hsl(40.6,96.1%,40.4%)',
              ),
              700 => 
              array (
                'hex_code' => '#a16207',
                'rgb_code' => 'rgb(161,98,7)',
                'hsl_code' => 'hsl(35.5,91.7%,32.9%)',
              ),
              800 => 
              array (
                'hex_code' => '#854d0e',
                'rgb_code' => 'rgb(133,77,14)',
                'hsl_code' => 'hsl(31.8,81%,28.8%)',
              ),
              900 => 
              array (
                'hex_code' => '#713f12',
                'rgb_code' => 'rgb(113,63,18)',
                'hsl_code' => 'hsl(28.4,72.5%,25.7%)',
              ),
            ),
            'lime' => 
            array (
              50 => 
              array (
                'hex_code' => '#f7fee7',
                'rgb_code' => 'rgb(247,254,231)',
                'hsl_code' => 'hsl(78.3,92%,95.1%)',
              ),
              100 => 
              array (
                'hex_code' => '#ecfccb',
                'rgb_code' => 'rgb(236,252,203)',
                'hsl_code' => 'hsl(79.6,89.1%,89.2%)',
              ),
              200 => 
              array (
                'hex_code' => '#d9f99d',
                'rgb_code' => 'rgb(217,249,157)',
                'hsl_code' => 'hsl(80.9,88.5%,79.6%)',
              ),
              300 => 
              array (
                'hex_code' => '#bef264',
                'rgb_code' => 'rgb(190,242,100)',
                'hsl_code' => 'hsl(82,84.5%,67.1%)',
              ),
              400 => 
              array (
                'hex_code' => '#a3e635',
                'rgb_code' => 'rgb(163,230,53)',
                'hsl_code' => 'hsl(82.7,78%,55.5%)',
              ),
              500 => 
              array (
                'hex_code' => '#84cc16',
                'rgb_code' => 'rgb(132,204,22)',
                'hsl_code' => 'hsl(83.7,80.5%,44.3%)',
              ),
              600 => 
              array (
                'hex_code' => '#65a30d',
                'rgb_code' => 'rgb(101,163,13)',
                'hsl_code' => 'hsl(84.8,85.2%,34.5%)',
              ),
              700 => 
              array (
                'hex_code' => '#4d7c0f',
                'rgb_code' => 'rgb(77,124,15)',
                'hsl_code' => 'hsl(85.9,78.4%,27.3%)',
              ),
              800 => 
              array (
                'hex_code' => '#3f6212',
                'rgb_code' => 'rgb(63,98,18)',
                'hsl_code' => 'hsl(86.3,69%,22.7%)',
              ),
              900 => 
              array (
                'hex_code' => '#365314',
                'rgb_code' => 'rgb(54,83,20)',
                'hsl_code' => 'hsl(87.6,61.2%,20.2%)',
              ),
            ),
            'green' => 
            array (
              50 => 
              array (
                'hex_code' => '#f0fdf4',
                'rgb_code' => 'rgb(240,253,244)',
                'hsl_code' => 'hsl(138.5,76.5%,96.7%)',
              ),
              100 => 
              array (
                'hex_code' => '#dcfce7',
                'rgb_code' => 'rgb(220,252,231)',
                'hsl_code' => 'hsl(140.6,84.2%,92.5%)',
              ),
              200 => 
              array (
                'hex_code' => '#bbf7d0',
                'rgb_code' => 'rgb(187,247,208)',
                'hsl_code' => 'hsl(141,78.9%,85.1%)',
              ),
              300 => 
              array (
                'hex_code' => '#86efac',
                'rgb_code' => 'rgb(134,239,172)',
                'hsl_code' => 'hsl(141.7,76.6%,73.1%)',
              ),
              400 => 
              array (
                'hex_code' => '#4ade80',
                'rgb_code' => 'rgb(74,222,128)',
                'hsl_code' => 'hsl(141.9,69.2%,58%)',
              ),
              500 => 
              array (
                'hex_code' => '#22c55e',
                'rgb_code' => 'rgb(34,197,94)',
                'hsl_code' => 'hsl(142.1,70.6%,45.3%)',
              ),
              600 => 
              array (
                'hex_code' => '#16a34a',
                'rgb_code' => 'rgb(22,163,74)',
                'hsl_code' => 'hsl(142.1,76.2%,36.3%)',
              ),
              700 => 
              array (
                'hex_code' => '#15803d',
                'rgb_code' => 'rgb(21,128,61)',
                'hsl_code' => 'hsl(142.4,71.8%,29.2%)',
              ),
              800 => 
              array (
                'hex_code' => '#166534',
                'rgb_code' => 'rgb(22,101,52)',
                'hsl_code' => 'hsl(142.8,64.2%,24.1%)',
              ),
              900 => 
              array (
                'hex_code' => '#14532d',
                'rgb_code' => 'rgb(20,83,45)',
                'hsl_code' => 'hsl(143.8,61.2%,20.2%)',
              ),
            ),
            'emerald' => 
            array (
              50 => 
              array (
                'hex_code' => '#ecfdf5',
                'rgb_code' => 'rgb(236,253,245)',
                'hsl_code' => 'hsl(151.8,81%,95.9%)',
              ),
              100 => 
              array (
                'hex_code' => '#d1fae5',
                'rgb_code' => 'rgb(209,250,229)',
                'hsl_code' => 'hsl(149.3,80.4%,90%)',
              ),
              200 => 
              array (
                'hex_code' => '#a7f3d0',
                'rgb_code' => 'rgb(167,243,208)',
                'hsl_code' => 'hsl(152.4,76%,80.4%)',
              ),
              300 => 
              array (
                'hex_code' => '#6ee7b7',
                'rgb_code' => 'rgb(110,231,183)',
                'hsl_code' => 'hsl(156.2,71.6%,66.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#34d399',
                'rgb_code' => 'rgb(52,211,153)',
                'hsl_code' => 'hsl(158.1,64.4%,51.6%)',
              ),
              500 => 
              array (
                'hex_code' => '#10b981',
                'rgb_code' => 'rgb(16,185,129)',
                'hsl_code' => 'hsl(160.1,84.1%,39.4%)',
              ),
              600 => 
              array (
                'hex_code' => '#059669',
                'rgb_code' => 'rgb(5,150,105)',
                'hsl_code' => 'hsl(161.4,93.5%,30.4%)',
              ),
              700 => 
              array (
                'hex_code' => '#047857',
                'rgb_code' => 'rgb(4,120,87)',
                'hsl_code' => 'hsl(162.9,93.5%,24.3%)',
              ),
              800 => 
              array (
                'hex_code' => '#065f46',
                'rgb_code' => 'rgb(6,95,70)',
                'hsl_code' => 'hsl(163.1,88.1%,19.8%)',
              ),
              900 => 
              array (
                'hex_code' => '#064e3b',
                'rgb_code' => 'rgb(6,78,59)',
                'hsl_code' => 'hsl(164.2,85.7%,16.5%)',
              ),
            ),
            'teal' => 
            array (
              50 => 
              array (
                'hex_code' => '#f0fdfa',
                'rgb_code' => 'rgb(240,253,250)',
                'hsl_code' => 'hsl(166.2,76.5%,96.7%)',
              ),
              100 => 
              array (
                'hex_code' => '#ccfbf1',
                'rgb_code' => 'rgb(204,251,241)',
                'hsl_code' => 'hsl(167.2,85.5%,89.2%)',
              ),
              200 => 
              array (
                'hex_code' => '#99f6e4',
                'rgb_code' => 'rgb(153,246,228)',
                'hsl_code' => 'hsl(168.4,83.8%,78.2%)',
              ),
              300 => 
              array (
                'hex_code' => '#5eead4',
                'rgb_code' => 'rgb(94,234,212)',
                'hsl_code' => 'hsl(170.6,76.9%,64.3%)',
              ),
              400 => 
              array (
                'hex_code' => '#2dd4bf',
                'rgb_code' => 'rgb(45,212,191)',
                'hsl_code' => 'hsl(172.5,66%,50.4%)',
              ),
              500 => 
              array (
                'hex_code' => '#14b8a6',
                'rgb_code' => 'rgb(20,184,166)',
                'hsl_code' => 'hsl(173.4,80.4%,40%)',
              ),
              600 => 
              array (
                'hex_code' => '#0d9488',
                'rgb_code' => 'rgb(13,148,136)',
                'hsl_code' => 'hsl(174.7,83.9%,31.6%)',
              ),
              700 => 
              array (
                'hex_code' => '#0f766e',
                'rgb_code' => 'rgb(15,118,110)',
                'hsl_code' => 'hsl(175.3,77.4%,26.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#115e59',
                'rgb_code' => 'rgb(17,94,89)',
                'hsl_code' => 'hsl(176.1,69.4%,21.8%)',
              ),
              900 => 
              array (
                'hex_code' => '#134e4a',
                'rgb_code' => 'rgb(19,78,74))',
                'hsl_code' => 'hsl(175.9,60.8%,19%)',
              ),
            ),
            'cyan' => 
            array (
              50 => 
              array (
                'hex_code' => '#ecfeff',
                'rgb_code' => 'rgb(236,254,255)',
                'hsl_code' => 'hsl(183.2,100%,96.3%)',
              ),
              100 => 
              array (
                'hex_code' => '#cffafe',
                'rgb_code' => 'rgb(207,250,254)',
                'hsl_code' => 'hsl(185.1,95.9%,90.4%)',
              ),
              200 => 
              array (
                'hex_code' => '#a5f3fc',
                'rgb_code' => 'rgb(165,243,252)',
                'hsl_code' => 'hsl(186.2,93.5%,81.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#67e8f9',
                'rgb_code' => 'rgb(103,232,249)',
                'hsl_code' => 'hsl(187,92.4%,69%)',
              ),
              400 => 
              array (
                'hex_code' => '#22d3ee',
                'rgb_code' => 'rgb(34,211,238)',
                'hsl_code' => 'hsl(187.9,85.7%,53.3%)',
              ),
              500 => 
              array (
                'hex_code' => '#06b6d4',
                'rgb_code' => 'rgb(6,182,212)',
                'hsl_code' => 'hsl(188.7,94.5%,42.7%)',
              ),
              600 => 
              array (
                'hex_code' => '#0891b2',
                'rgb_code' => 'rgb(8,145,178)',
                'hsl_code' => 'hsl(191.6,91.4%,36.5%)',
              ),
              700 => 
              array (
                'hex_code' => '#0e7490',
                'rgb_code' => 'rgb(14,116,144)',
                'hsl_code' => 'hsl(192.9,82.3%,31%)',
              ),
              800 => 
              array (
                'hex_code' => '#155e75',
                'rgb_code' => 'rgb(21,94,117)',
                'hsl_code' => 'hsl(194.4,69.6%,27.1%)',
              ),
              900 => 
              array (
                'hex_code' => '#164e63',
                'rgb_code' => 'rgb(22,78,99)',
                'hsl_code' => 'hsl(196.4,63.6%,23.7%)',
              ),
            ),
            'sky' => 
            array (
              50 => 
              array (
                'hex_code' => '#f0f9ff',
                'rgb_code' => 'rgb(240,249,255)',
                'hsl_code' => 'hsl(204,100%,97.1%)',
              ),
              100 => 
              array (
                'hex_code' => '#e0f2fe',
                'rgb_code' => 'rgb(224,242,254)',
                'hsl_code' => 'hsl(204,93.8%,93.7%)',
              ),
              200 => 
              array (
                'hex_code' => '#bae6fd',
                'rgb_code' => 'rgb(186,230,253)',
                'hsl_code' => 'hsl(200.6,94.4%,86.1%)',
              ),
              300 => 
              array (
                'hex_code' => '#7dd3fc',
                'rgb_code' => 'rgb(125,211,252)',
                'hsl_code' => 'hsl(199.4,95.5%,73.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#38bdf8',
                'rgb_code' => 'rgb(56,189,248)',
                'hsl_code' => 'hsl(198.4,93.2%,59.6%)',
              ),
              500 => 
              array (
                'hex_code' => '#0ea5e9',
                'rgb_code' => 'rgb(14,165,233)',
                'hsl_code' => 'hsl(198.6,88.7%,48.4%)',
              ),
              600 => 
              array (
                'hex_code' => '#0284c7',
                'rgb_code' => 'rgb(2,132,199)',
                'hsl_code' => 'hsl(200.4,98%,39.4%)',
              ),
              700 => 
              array (
                'hex_code' => '#0369a1',
                'rgb_code' => 'rgb(3,105,161)',
                'hsl_code' => 'hsl(201.3,96.3%,32.2%)',
              ),
              800 => 
              array (
                'hex_code' => '#075985',
                'rgb_code' => 'rgb(7,89,133)',
                'hsl_code' => 'hsl(201,90%,27.5%)',
              ),
              900 => 
              array (
                'hex_code' => '#0c4a6e',
                'rgb_code' => 'rgb(12,74,110)',
                'hsl_code' => 'hsl(202,80.3%,23.9%)',
              ),
            ),
            'blue' => 
            array (
              50 => 
              array (
                'hex_code' => '#eff6ff',
                'rgb_code' => 'rgb(239,246,255)',
                'hsl_code' => 'hsl(213.8,100%,96.9%)',
              ),
              100 => 
              array (
                'hex_code' => '#dbeafe',
                'rgb_code' => 'rgb(219,234,254)',
                'hsl_code' => 'hsl(214.3,94.6%,92.7%)',
              ),
              200 => 
              array (
                'hex_code' => '#bfdbfe',
                'rgb_code' => 'rgb(191,219,254)',
                'hsl_code' => 'hsl(213.3,96.9%,87.3%)',
              ),
              300 => 
              array (
                'hex_code' => '#93c5fd',
                'rgb_code' => 'rgb(147,197,253)',
                'hsl_code' => 'hsl(211.7,96.4%,78.4%)',
              ),
              400 => 
              array (
                'hex_code' => '#60a5fa',
                'rgb_code' => 'rgb(96,165,250)',
                'hsl_code' => 'hsl(213.1,93.9%,67.8%)',
              ),
              500 => 
              array (
                'hex_code' => '#3b82f6',
                'rgb_code' => 'rgb(59,130,246)',
                'hsl_code' => 'hsl(217.2,91.2%,59.8%)',
              ),
              600 => 
              array (
                'hex_code' => '#2563eb',
                'rgb_code' => 'rgb(37,99,235)',
                'hsl_code' => 'hsl(221.2,83.2%,53.3%)',
              ),
              700 => 
              array (
                'hex_code' => '#1d4ed8',
                'rgb_code' => 'rgb(29,78,216)',
                'hsl_code' => 'hsl(224.3,76.3%,48%)',
              ),
              800 => 
              array (
                'hex_code' => '#1e40af',
                'rgb_code' => 'rgb(30,64,175)',
                'hsl_code' => 'hsl(225.9,70.7%,40.2%)',
              ),
              900 => 
              array (
                'hex_code' => '#1e3a8a',
                'rgb_code' => 'rgb(30,58,138)',
                'hsl_code' => 'hsl(224.4,64.3%,32.9%)',
              ),
            ),
            'indigo' => 
            array (
              50 => 
              array (
                'hex_code' => '#eef2ff',
                'rgb_code' => 'rgb(238,242,255)',
                'hsl_code' => 'hsl(225.9,100%,96.7%)',
              ),
              100 => 
              array (
                'hex_code' => '#e0e7ff',
                'rgb_code' => 'rgb(224,231,255)',
                'hsl_code' => 'hsl(226.5,100%,93.9%)',
              ),
              200 => 
              array (
                'hex_code' => '#c7d2fe',
                'rgb_code' => 'rgb(199,210,254)',
                'hsl_code' => 'hsl(228,96.5%,88.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#a5b4fc',
                'rgb_code' => 'rgb(165,180,252)',
                'hsl_code' => 'hsl(229.7,93.5%,81.8%)',
              ),
              400 => 
              array (
                'hex_code' => '#818cf8',
                'rgb_code' => 'rgb(129,140,248)',
                'hsl_code' => 'hsl(234.5,89.5%,73.9%)',
              ),
              500 => 
              array (
                'hex_code' => '#6366f1',
                'rgb_code' => 'rgb(99,102,241)',
                'hsl_code' => 'hsl(238.7,83.5%,66.7%)',
              ),
              600 => 
              array (
                'hex_code' => '#4f46e5',
                'rgb_code' => 'rgb(79,70,229)',
                'hsl_code' => 'hsl(243.4,75.4%,58.6%)',
              ),
              700 => 
              array (
                'hex_code' => '#4338ca',
                'rgb_code' => 'rgb(67,56,202)',
                'hsl_code' => 'hsl(244.5,57.9%,50.6%)',
              ),
              800 => 
              array (
                'hex_code' => '#3730a3',
                'rgb_code' => 'rgb(55,48,163)',
                'hsl_code' => 'hsl(243.7,54.5%,41.4%)',
              ),
              900 => 
              array (
                'hex_code' => '#312e81',
                'rgb_code' => 'rgb(49,46,129)',
                'hsl_code' => 'hsl(242.2,47.4%,34.3%)',
              ),
            ),
            'violet' => 
            array (
              50 => 
              array (
                'hex_code' => '#f5f3ff',
                'rgb_code' => 'rgb(245,243,255)',
                'hsl_code' => 'hsl(250,100%,97.6%)',
              ),
              100 => 
              array (
                'hex_code' => '#ede9fe',
                'rgb_code' => 'rgb(237,233,254)',
                'hsl_code' => 'hsl(251.4,91.3%,95.5%)',
              ),
              200 => 
              array (
                'hex_code' => '#ddd6fe',
                'rgb_code' => 'rgb(221,214,254)',
                'hsl_code' => 'hsl(250.5,95.2%,91.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#c4b5fd',
                'rgb_code' => 'rgb(196,181,253)',
                'hsl_code' => 'hsl(252.5,94.7%,85.1%)',
              ),
              400 => 
              array (
                'hex_code' => '#a78bfa',
                'rgb_code' => 'rgb(167,139,250)',
                'hsl_code' => 'hsl(255.1,91.7%,76.3%)',
              ),
              500 => 
              array (
                'hex_code' => '#8b5cf6',
                'rgb_code' => 'rgb(139,92,246)',
                'hsl_code' => 'hsl(258.3,89.5%,66.3%)',
              ),
              600 => 
              array (
                'hex_code' => '#7c3aed',
                'rgb_code' => 'rgb(124,58,237)',
                'hsl_code' => 'hsl(262.1,83.3%,57.8%)',
              ),
              700 => 
              array (
                'hex_code' => '#6d28d9',
                'rgb_code' => 'rgb(109,40,217)',
                'hsl_code' => 'hsl(263.4,70%,50.4%)',
              ),
              800 => 
              array (
                'hex_code' => '#5b21b6',
                'rgb_code' => 'rgb(91,33,182)',
                'hsl_code' => 'hsl(263.4,69.3%,42.2%)',
              ),
              900 => 
              array (
                'hex_code' => '#4c1d95',
                'rgb_code' => 'rgb(76,29,149)',
                'hsl_code' => 'hsl(263.5,67.4%,34.9%)',
              ),
            ),
            'purple' => 
            array (
              50 => 
              array (
                'hex_code' => '#faf5ff',
                'rgb_code' => 'rgb(250,245,255)',
                'hsl_code' => 'hsl(270,100%,98%)',
              ),
              100 => 
              array (
                'hex_code' => '#f3e8ff',
                'rgb_code' => 'rgb(243,232,255)',
                'hsl_code' => 'hsl(268.7,100%,95.5%)',
              ),
              200 => 
              array (
                'hex_code' => '#e9d5ff',
                'rgb_code' => 'rgb(233,213,255)',
                'hsl_code' => 'hsl(268.6,100%,91.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#d8b4fe',
                'rgb_code' => 'rgb(216,180,254)',
                'hsl_code' => 'hsl(269.2,97.4%,85.1%)',
              ),
              400 => 
              array (
                'hex_code' => '#c084fc',
                'rgb_code' => 'rgb(192,132,252)',
                'hsl_code' => 'hsl(270,95.2%,75.3%)',
              ),
              500 => 
              array (
                'hex_code' => '#a855f7',
                'rgb_code' => 'rgb(168,85,247)',
                'hsl_code' => 'hsl(270.7,91%,65.1%)',
              ),
              600 => 
              array (
                'hex_code' => '#9333ea',
                'rgb_code' => 'rgb(147,51,234)',
                'hsl_code' => 'hsl(271.5,81.3%,55.9%)',
              ),
              700 => 
              array (
                'hex_code' => '#7e22ce',
                'rgb_code' => 'rgb(126,34,206)',
                'hsl_code' => 'hsl(272.1,71.7%,47.1%)',
              ),
              800 => 
              array (
                'hex_code' => '#6b21a8',
                'rgb_code' => 'rgb(107,33,168)',
                'hsl_code' => 'hsl(272.9,67.2%,39.4%)',
              ),
              900 => 
              array (
                'hex_code' => '#581c87',
                'rgb_code' => 'rgb(88,28,135)',
                'hsl_code' => 'hsl(273.6,65.6%,32%)',
              ),
            ),
            'fuchsia' => 
            array (
              50 => 
              array (
                'hex_code' => '#fdf4ff',
                'rgb_code' => 'rgb(253,244,255)',
                'hsl_code' => 'hsl(289.1,100%,97.8%)',
              ),
              100 => 
              array (
                'hex_code' => '#fae8ff',
                'rgb_code' => 'rgb(250,232,255))',
                'hsl_code' => 'hsl(287,100%,95.5%)',
              ),
              200 => 
              array (
                'hex_code' => '#f5d0fe',
                'rgb_code' => 'rgb(245,208,254)',
                'hsl_code' => 'hsl(288.3,95.8%,90.6%)',
              ),
              300 => 
              array (
                'hex_code' => '#f0abfc',
                'rgb_code' => 'rgb(240,171,252)',
                'hsl_code' => 'hsl(291.1,93.1%,82.9%)',
              ),
              400 => 
              array (
                'hex_code' => '#e879f9',
                'rgb_code' => 'rgb(232,121,249)',
                'hsl_code' => 'hsl(292,91.4%,72.5%)',
              ),
              500 => 
              array (
                'hex_code' => '#d946ef',
                'rgb_code' => 'rgb(217,70,239)',
                'hsl_code' => 'hsl(292.2,84.1%,60.6%)',
              ),
              600 => 
              array (
                'hex_code' => '#c026d3',
                'rgb_code' => 'rgb(192,38,211)',
                'hsl_code' => 'hsl(293.4,69.5%,48.8%)',
              ),
              700 => 
              array (
                'hex_code' => '#a21caf',
                'rgb_code' => 'rgb(162,28,175)',
                'hsl_code' => 'hsl(294.7,72.4%,39.8%)',
              ),
              800 => 
              array (
                'hex_code' => '#86198f',
                'rgb_code' => 'rgb(134,25,143)',
                'hsl_code' => 'hsl(295.4,70.2%,32.9%)',
              ),
              900 => 
              array (
                'hex_code' => '#701a75',
                'rgb_code' => 'rgb(112,26,117)',
                'hsl_code' => 'hsl(296.7,63.6%,28%)',
              ),
            ),
            'pink' => 
            array (
              50 => 
              array (
                'hex_code' => '#fdf2f8',
                'rgb_code' => 'rgb(253,242,248)',
                'hsl_code' => 'hsl(327.3,73.3%,97.1%)',
              ),
              100 => 
              array (
                'hex_code' => '#fce7f3',
                'rgb_code' => 'rgb(252,231,243)',
                'hsl_code' => 'hsl(325.7,77.8%,94.7%)',
              ),
              200 => 
              array (
                'hex_code' => '#fbcfe8',
                'rgb_code' => 'rgb(251,207,232)',
                'hsl_code' => 'hsl(325.9,84.6%,89.8%)',
              ),
              300 => 
              array (
                'hex_code' => '#f9a8d4',
                'rgb_code' => 'rgb(249,168,212)',
                'hsl_code' => 'hsl(327.4,87.1%,81.8%)',
              ),
              400 => 
              array (
                'hex_code' => '#f472b6',
                'rgb_code' => 'rgb(244,114,182)',
                'hsl_code' => 'hsl(328.6,85.5%,70.2%)',
              ),
              500 => 
              array (
                'hex_code' => '#ec4899',
                'rgb_code' => 'rgb(236,72,153)',
                'hsl_code' => 'hsl(330.4,81.2%,60.4%)',
              ),
              600 => 
              array (
                'hex_code' => '#db2777',
                'rgb_code' => 'rgb(219,39,119)',
                'hsl_code' => 'hsl(333.3,71.4%,50.6%)',
              ),
              700 => 
              array (
                'hex_code' => '#be185d',
                'rgb_code' => 'rgb(190,24,93)',
                'hsl_code' => 'hsl(335.1,77.6%,42%)',
              ),
              800 => 
              array (
                'hex_code' => '#9d174d',
                'rgb_code' => 'rgb(157,23,77)',
                'hsl_code' => 'hsl(335.8,74.4%,35.3%)',
              ),
              900 => 
              array (
                'hex_code' => '#831843',
                'rgb_code' => 'rgb(131,24,67)',
                'hsl_code' => 'hsl(335.9,69%,30.4%)',
              ),
            ),
            'rose' => 
            array (
              50 => 
              array (
                'hex_code' => '#fff1f2',
                'rgb_code' => 'rgb(255,241,242)',
                'hsl_code' => 'hsl(355.7,100%,97.3%)',
              ),
              100 => 
              array (
                'hex_code' => '#ffe4e6',
                'rgb_code' => 'rgb(255,228,230)',
                'hsl_code' => 'hsl(355.6,100%,94.7%)',
              ),
              200 => 
              array (
                'hex_code' => '#fecdd3',
                'rgb_code' => 'rgb(254,205,211)',
                'hsl_code' => 'hsl(352.7,96.1%,90%)',
              ),
              300 => 
              array (
                'hex_code' => '#fda4af',
                'rgb_code' => 'rgb(253,164,175)',
                'hsl_code' => 'hsl(352.6,95.7%,81.8%)',
              ),
              400 => 
              array (
                'hex_code' => '#fb7185',
                'rgb_code' => 'rgb(251,113,133)',
                'hsl_code' => 'hsl(351.3,94.5%,71.4%)',
              ),
              500 => 
              array (
                'hex_code' => '#f43f5e',
                'rgb_code' => 'rgb(244,63,94)',
                'hsl_code' => 'hsl(349.7,89.2%,60.2%)',
              ),
              600 => 
              array (
                'hex_code' => '#e11d48',
                'rgb_code' => 'rgb(225,29,72)',
                'hsl_code' => 'hsl(346.8,77.2%,49.8%)',
              ),
              700 => 
              array (
                'hex_code' => '#be123c',
                'rgb_code' => 'rgb(190,18,60)',
                'hsl_code' => 'hsl(345.3,82.7%,40.8%)',
              ),
              800 => 
              array (
                'hex_code' => '#9f1239',
                'rgb_code' => 'rgb(159,18,57)',
                'hsl_code' => 'hsl(343.4,79.7%,34.7%)',
              ),
              900 => 
              array (
                'hex_code' => '#881337',
                'rgb_code' => 'rgb(136,19,55)',
                'hsl_code' => 'hsl(341.5,75.5%,30.4%)',
              ),
            ),
        );

        $data = [];
        foreach($array as $key => $item) {
            $data[] = $item;
            Storage::disk('public')->put('color_new.txt', var_export($data, true));
        }

        //==================================
        // $data = json_decode(file_get_contents(base_path('public/color.json')), true);
        // $newArray = [];
        // foreach($data as $item) {
        //     $type = strtolower($item['type']);
        //     $name = strtolower($item['name']);
            
        //     $newArray[$type][$name] = [
        //         "hex_code" => $item['hex_code'],
        //         "rgb_code" => $item['rgb_code'],
        //         "hsl_code" => $item['hsl_code']
        //     ];
        // }
        // Storage::disk('public')->put('color_new.json', json_encode($newArray));
        // Storage::disk('public')->put('color_new.txt', var_export($newArray, true));
    }
}
