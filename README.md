# ProgTest
Teste de programmation d'un petit API avec un front-end utilisant vue.js

Le tout utilise NPM pour installer les package requis au projet

L'Api est dans le dossier permutations donc peut être appeler en GET avec /permutations/?states[0]=.&states[1]=x&states[2]=o comme demandé

Executer un watch de npm pour que lorsqu'il trouve des changement, qu'il recompile notre dossier /dist
npm run watch

Quand c'est final et quon veux notre dernier dist compiler et a jour sur le git
npm run prod
