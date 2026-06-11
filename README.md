# Comparação entre as Abordagens do Jogo da Forca em PHP e JavaScript

## Introdução

Para compreender diferentes formas de desenvolvimento de aplicações web, foram criadas duas versões do Jogo da Forca: uma utilizando PHP e outra utilizando JavaScript. Embora ambas possuam o mesmo objetivo funcional, as tecnologias utilizadas possuem arquiteturas e formas de processamento distintas, o que impacta diretamente na experiência do usuário, desempenho e organização do sistema.

## Implementação em PHP

Na versão desenvolvida em PHP, toda a lógica do jogo é processada no servidor. Cada vez que o usuário informa uma letra, uma requisição HTTP é enviada ao servidor, que executa o código PHP, atualiza o estado do jogo e devolve uma nova página HTML ao navegador.

O estado da partida é armazenado utilizando sessões (`$_SESSION`), permitindo que as informações sejam mantidas entre as requisições.

Fluxo de execução:

Usuário → Formulário HTML → Servidor PHP → Processamento → Nova Página HTML → Navegador

### Vantagens

* Introduz conceitos importantes de desenvolvimento backend.
* Permite aprender sobre requisições HTTP.
* Utiliza sessões para persistência de dados.
* Facilita futura integração com banco de dados.

### Desvantagens

* Necessita de um servidor para execução.
* A página é recarregada a cada jogada.
* Experiência menos dinâmica para o usuário.
* Maior consumo de recursos do servidor.

---

## Implementação em JavaScript

Na versão JavaScript, toda a lógica do jogo é executada diretamente no navegador do usuário. Após o carregamento inicial da página, não são necessárias novas requisições ao servidor.

O JavaScript manipula o DOM (Document Object Model), atualizando a interface em tempo real conforme o usuário realiza suas tentativas.

Fluxo de execução:

Usuário → JavaScript → Atualização do DOM → Interface Atualizada

### Vantagens

* Maior velocidade de resposta.
* Não recarrega a página.
* Melhor experiência para o usuário.
* Menor carga no servidor.
* Interface mais interativa.

### Desvantagens

* O estado do jogo é perdido ao atualizar a página.
* Menor foco em conceitos de backend.
* Menor controle sobre os dados, pois toda a lógica fica exposta no navegador.

---

## Comparação Técnica

| Característica           | PHP      | JavaScript |
| ------------------------ | -------- | ---------- |
| Local de execução        | Servidor | Navegador  |
| Necessita servidor       | Sim      | Não        |
| Recarrega página         | Sim      | Não        |
| Uso de sessão            | Sim      | Não        |
| Manipulação de interface | Limitada | Dinâmica   |
| Velocidade de resposta   | Menor    | Maior      |
| Consumo do servidor      | Maior    | Menor      |
| Aprendizado principal    | Backend  | Frontend   |
| Escalabilidade visual    | Média    | Alta       |

---

## Versionamento Semântico das Entregas

Ambos os projetos foram desenvolvidos seguindo o conceito de Versionamento Semântico (Semantic Versioning).

### Versão 1.0.0

Entrega mínima viável (MVP):

* Sorteio de palavras.
* Controle de tentativas.
* Verificação de vitória e derrota.

### Versão 1.1.0

Melhorias incrementais:

* Controle de letras utilizadas.
* Validações adicionais.

### Versão 1.2.0

Melhorias de experiência:

* Interface visual aprimorada.
* Feedback ao usuário.

### Versão 2.0.0

Mudanças estruturais:

* Refatoração do código.
* Organização em módulos (JavaScript) ou MVC (PHP).

---

## Conclusão

As duas implementações atendem ao mesmo requisito funcional, porém demonstram abordagens diferentes de desenvolvimento web. O PHP evidencia conceitos de backend, sessões e processamento no servidor, enquanto o JavaScript destaca a manipulação dinâmica da interface e o processamento no lado do cliente.

Para aplicações modernas, é comum utilizar ambas as tecnologias em conjunto, com o PHP atuando como backend responsável pelas regras de negócio e armazenamento de dados, enquanto o JavaScript é utilizado para proporcionar uma experiência mais dinâmica e interativa ao usuário.
