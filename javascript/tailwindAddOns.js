tailwind.config = {
    theme: {
        screens: {
            sm: '480px',
            md: '890px',
            lg: '1325px',
        },
        extend: {
            keyframes: {
                'rotateTo-90': {
                  '0%': {transform: 'rotate(0deg)'},
                  '100%': { transform: 'rotate(-90deg)' },
                },
                'rotateTo0': {
                    '0%': {transform: 'rotate(0deg)'},
                    '100%': { transform: 'rotate(-90deg)' },
                  },
            },
            spacing: {
                '82': '328px',
            },
            dropShadow: {
                'text': '0 4px 4px #1E1E1E',
            },
            boxShadow: {
                'left':	'-4px 0 4px #2D0F44',
            },
            lineHeight: {
                '27px': '27px',
            },
            colors: {
                primaryColor: '#853AC0',
                secondaryColor: '#F1F1F1',
                placeholderGray: '#7D7D7D',
            },
            fontSize: {
                '1.5xl': '22px', 
                '2xl': '24px',
                '2.5xl': '28px', 
                '10px' : '10px',
                '8px' : '8px',
            },
            inset: {
                '1/12': '8.333%',
            },
            width: {
                '180' : '720px',
                '160' : '640px',
                '67' : '272px',
                '54' : '208px',
                '150': '600px',
                '135': '540px',
                '120': '480px',
                '280px': '280px',
                '92': '368px',
                '70' : '280px',
                '86': '344px',
                '88': '352px',
                '82': '328px',
                '100': '400px',
                '105': '420px',
                '6.5': '26px',
                '300px': '300px', 
                '84' : '336px',
            },
            height: {
                '100': '400px',
                '58' : '232px',
                '82': '328px',
                '54' : '208px',
                '88': '352px',
                '105': '420px',
                '120': '480px',
                '67' : '272px',
                '50' : '200px',
                '158px' : '158px',
                '26' : '104px',
                '70' : '280px',
                '84' : '336px',
                '6.5': '26px',
                '275px': '275px',
                '180px': '180px',
            },
        },
        fontFamily: {
            'sans': ['Inter', 'sans-serif'],
        },
    }
}