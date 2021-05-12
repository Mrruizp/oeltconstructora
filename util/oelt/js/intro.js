$(window)['on']('load', function() {
    'use strict';
    $['ready']['then'](function() {
        var _0xafb2x1 = 0;
        var _0xafb2x2 = 5;
        var _0xafb2x3 = true;
        var _0xafb2x4 = $('#playerintro');
        var _0xafb2x5 = $('.preloaderintro');
        var _0xafb2x6 = document['getElementById']('playerintro');
        var _0xafb2x7 = $('.bgintro img');
        var _0xafb2x8 = $('.logointro');
        var _0xafb2x9 = $('.headingintro');
        var _0xafb2xa = $('.subheadingintro');
        _0xafb2x5['fadeOut']('slow', function() {
            $('#boxintro')['fadeIn'](300);
            _0xafb2x4[0]['volume'] = 0;
            _0xafb2x4['animate']({
                volume: 1
            }, 3000);
            _0xafb2x6['play']();
            $('#soundintro')['on']('click', function(_0xafb2xb) {
                $(this)['toggleClass']('soundOffintro');
                if (_0xafb2x3 === false) {
                    _0xafb2x6['play']();
                    _0xafb2x3 = true;
                    _0xafb2x4[0]['volume'] = 0;
                    _0xafb2x4['animate']({
                        volume: 1
                    }, 1000)
                } else {
                    _0xafb2x3 = false;
                    _0xafb2x4[0]['volume'] = 1;
                    _0xafb2x4['animate']({
                        volume: 0
                    }, 1000)
                }
            });
            setTimeout(_0xafb2xc, 1000)
        });

        function _0xafb2xc() {
            _0xafb2x1++;
            window['page'] = $('#frame' + _0xafb2x1);
            console['log'](page);
            page['fadeIn'](1000);
            $('#boxopening')['animate']({
                "\x74\x6F\x70": '-=100%'
            }, 'slow');
            $([_0xafb2x7, _0xafb2x8, _0xafb2x9, _0xafb2xa])['each'](function() {
                var _0xafb2xd = $(this);
                var _0xafb2xe = $(this)['attr']('data-time');
                setTimeout(function() {
                    _0xafb2xd['addClass']('intro')
                }, _0xafb2xe)
            });
            if (_0xafb2x1 === _0xafb2x2) {
                setTimeout(_0xafb2x10, 11000)
            } else {
                setTimeout(_0xafb2xf, 8000)
            }
        }

        function _0xafb2xf() {
            page['fadeOut'](1000);
            _0xafb2x7, _0xafb2x8, _0xafb2x9, _0xafb2xa['removeClass']('intro');
            setTimeout(_0xafb2xc, 800)
        }

        function _0xafb2x10() {
            _0xafb2x5['fadeIn'](1000);
            page['fadeOut'](1000);
            if (_0xafb2x3 === true) {
                _0xafb2x6['play']();
                _0xafb2x3 = false;
                _0xafb2x4[0]['volume'] = 1;
                _0xafb2x4['animate']({
                    volume: 0
                }, 1000)
            };
            setTimeout(function() {
                window['location']['href'] = 'inicio.html'
            }, 2000)
        }
    })
})