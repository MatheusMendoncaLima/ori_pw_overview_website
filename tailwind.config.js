import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito Sans', 'Arial', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, daisyui],
    daisyui: {
        themes: [
            {
                ori: {
                    'color-scheme': 'light',
                    primary: '#0082A3',
                    'primary-content': '#FFFFFF',
                    secondary: '#0F6E72',
                    'secondary-content': '#FFFFFF',
                    accent: '#5C768D',
                    'accent-content': '#FFFFFF',
                    neutral: '#102A45',
                    'neutral-content': '#FFFFFF',
                    'base-100': '#FFFFFF',
                    'base-200': '#F2FAFE',
                    'base-300': '#E5F0FA',
                    'base-content': '#102A45',
                    info: '#5B9BD9',
                    'info-content': '#102A45',
                    success: '#2E7D32',
                    'success-content': '#FFFFFF',
                    warning: '#D9B23C',
                    'warning-content': '#102A45',
                    error: '#D32F2F',
                    'error-content': '#FFFFFF',
                    '--rounded-box': '1.25rem',
                    '--rounded-btn': '9999px',
                    '--rounded-badge': '9999px',
                    '--tab-radius': '9999px',
                    '--border': '1px',
                    '--depth': '0',
                    '--noise': '0',
                },
            },
            {
                'ori-dark': {
                    'color-scheme': 'dark',
                    primary: '#5ABDD8',
                    'primary-content': '#0C1824',
                    secondary: '#62C4BE',
                    'secondary-content': '#0C1824',
                    accent: '#A7B9C8',
                    'accent-content': '#0C1824',
                    neutral: '#243849',
                    'neutral-content': '#E4EDF4',
                    'base-100': '#142230',
                    'base-200': '#0C1824',
                    'base-300': '#1C2E3F',
                    'base-content': '#E4EDF4',
                    info: '#7FAEDB',
                    'info-content': '#0C1824',
                    success: '#86C79A',
                    'success-content': '#0C1824',
                    warning: '#D2B76C',
                    'warning-content': '#0C1824',
                    error: '#F2A29B',
                    'error-content': '#0C1824',
                    '--rounded-box': '1.25rem',
                    '--rounded-btn': '9999px',
                    '--rounded-badge': '9999px',
                    '--tab-radius': '9999px',
                    '--border': '1px',
                    '--depth': '0',
                    '--noise': '0',
                },
            },
        ],
        darkTheme: 'ori-dark',
    },
};
