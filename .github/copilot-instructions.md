# Copilot Code Instructions

## 1. Estrutura de Pastas Organizada

- Utilize a estrutura recomendada do Next.js, segregando **pages** (ou **app** no Next.js 13+), **components**, **styles**, **lib** (ou **utils**) e outras pastas conforme a lógica do projeto.
- Mantenha componentes reutilizáveis em uma pasta própria (`components/`) e, se possível, utilize **CSS Modules** ou **styled-components** em **styles/** para organização dos estilos.
- Nomeie pastas e arquivos de forma clara e padronizada. Evite duplicidade ou nomes genéricos demais.

---

## 4. Uso Correto dos Hooks de Dados (React e Next.js)

- Evite buscar dados repetidamente em componentes diferentes. Sempre que possível, utilize hooks customizados ou bibliotecas como **React Query** ou **SWR** para centralizar a lógica de busca e cache de dados.
- Organize a lógica de chamadas à API separadamente (por exemplo, em `/services` ou `/lib`) para manter a coesão e facilitar a manutenção.

---

## 6. Otimização de Imagens e Fontes

- Utilize o componente `next/image` para carregamento otimizado de imagens, gerando versões em diferentes formatos (WebP, AVIF) e resoluções conforme a tela do usuário.
- Especifique sempre as propriedades `width` e `height` para prevenir _layout shift_ e melhorar a performance.
- Para as fontes, faça uso de **next/font** (ou outra configuração similar no Next.js 13+) a fim de otimizar o carregamento, evitando problemas como _Flash Of Unstyled Text (FOUT)_.

---

## 8. Responsividade e Acessibilidade

- Adote o conceito de **Mobile First**: inicie o layout pensando em telas menores e vá adaptando para tamanhos maiores conforme necessário.
- Use tags semânticas do HTML (`<header>`, `<nav>`, `<main>`, `<footer>`, etc.) e garanta que o site seja acessível (atributos `alt` para imagens, `aria-label`s adequados, etc.).

---

## 9. Performance e Otimizações

- Explore o _Code Splitting_ automático do Next.js e, se necessário, utilize _dynamic imports_ para componentes mais pesados.
- Configure **cache**, **gzip**/**brotli** e **CDN** para servir arquivos estáticos com mais velocidade.
- Monitore métricas de performance como FCP, LCP, TTI e CLS e implemente melhorias contínuas com base nesses dados.

---

## 11. Uso de TypeScript

- Ative o uso do TypeScript no seu projeto Next.js (arquivo `tsconfig.json`) e habilite regras como `strict`, `noImplicitAny` e outras que aumentem a segurança dos tipos.
- Defina interfaces e tipos para as _props_ dos componentes, garantindo consistência e reduzindo erros de tipagem.
- Use `any` ou `unknown` apenas em último caso, preferindo sempre tipos mais específicos.

---

# Instruções de Code Review

Durante o processo de **Code Review**, siga estas diretrizes para garantir a qualidade e a consistência do código no projeto:

## 1. **Clareza e Legibilidade**

- **Nomes Descritivos**: Verifique se os nomes de variáveis, funções e componentes são descritivos e refletem claramente seu propósito.
- **Comentários**: Comentarios são proibidos, o código deve ser autoexplicativo.
- **Formatação**: Confirme se o código segue as regras de formatação padronizadas (usando ferramentas como **Prettier** ou regras de ESLint configuradas no projeto).

---

## 2. **Qualidade e Consistência**

- **Padrões do Projeto**: O código segue os padrões arquiteturais e as boas práticas descritas no projeto?
- **Reutilização**: Componentes ou lógicas que são reutilizáveis estão devidamente abstraídas?
- **Boas Práticas de Framework**: O código faz uso adequado dos recursos do Next.js (rotas, SSR/SSG, etc.) e bibliotecas auxiliares, como React Query, SWR, etc.?

---

## 3. **Performance**

- **Carregamento Sob Demanda**: Verifique se componentes pesados são carregados dinamicamente com _dynamic imports_ quando necessário.
- **Otimização de Consultas**: Avalie se chamadas de API são eficientes e evitam redundâncias.
- **Imagens e Fontes**: O componente `next/image` está sendo usado corretamente para otimizar imagens? Fontes estão carregando de forma eficiente?

---

## 4. **Testes**

- **Cobertura de Testes**: Verifique se as alterações possuem cobertura de testes de unidade e/ou integração.
- **Testes Automatizados**: As alterações foram testadas automaticamente em pipelines de CI/CD antes do merge?
- **Testes Manuais**: Realize uma validação manual para garantir que fluxos principais não foram quebrados.

---

## Checklist de Revisão

Antes de aprovar um _pull request_, certifique-se de que:

1. O código é claro, legível e segue os padrões definidos no projeto.
2. Não há problemas de performance evidentes.
3. Medidas de segurança foram adequadamente aplicadas.
4. Os testes automatizados passaram e cobrem as alterações propostas.
5. Todas as alterações estão alinhadas com os objetivos do projeto.
6. Utilize clean code principles e evite duplicidade de código.
7.

---
