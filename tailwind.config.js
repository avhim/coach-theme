module.exports = {
  content: ['./*.php', './template-parts/**/*.php'],
  theme: {
    extend: {
      fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
      colors: { forest: '#19332d', terracotta: '#c97755', cream: '#f7f5ef' },
    },
  },
  plugins: [require('@tailwindcss/typography')],
};
