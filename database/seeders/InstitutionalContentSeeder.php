<?php

namespace Database\Seeders;

use App\Models\InstitutionalContent;
use Illuminate\Database\Seeder;

class InstitutionalContentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'who-we-are', 'Quem somos', 'AUTONOMIA EM PRIMEIRO LUGAR',
                'O ORI é um aplicativo de rotina, Comunicação Aumentativa e Alternativa (CAA) e cuidado para pessoas com deficiência e quem as acompanha, com foco inicial em pessoas neurodivergentes.',
                'A proposta reúne organização da rotina, comunicação e preferências de acessibilidade em um ambiente compartilhado. A abordagem autonomy-first orienta que os apoios complementem a capacidade da pessoa e não substituam suas decisões. O ORI é uma tecnologia assistiva de apoio; não se apresenta como tratamento ou terapia. O sistema distingue identidade, dados de perfil, vínculos de acompanhamento e permissões de acesso.',
                1,
            ],
            [
                'problem', 'Problema e motivação', 'POR QUE O ORI EXISTE',
                'O projeto investiga a fragmentação entre ferramentas usadas para organização da rotina e comunicação.',
                'O ORI parte da hipótese de que aproximar esses recursos em um ambiente com identidade e preferências comuns pode reduzir a fragmentação. A redução do esforço cognitivo e qualquer aumento de autonomia são hipóteses a investigar; o artigo não apresenta evidências de que esses efeitos tenham ocorrido.',
                2,
            ],
            [
                'objectives', 'Objetivos', 'ESCOPO DA PESQUISA',
                'Desenvolver um protótipo móvel modular que integre rotina, CAA e personalização e avaliar sua conformidade com os requisitos especificados.',
                'Os objetivos específicos são revisar a literatura relacionada; consolidar o escopo do MVP; definir perfis, permissões e fluxos; modelar a arquitetura; prototipar as interfaces principais; implementar as funções essenciais; e documentar testes, evidências, limitações e problemas encontrados.',
                3,
            ],
            [
                'routine', 'Rotina', 'PILAR 01 · ORGANIZAÇÃO',
                'O módulo de rotina apresenta atividades com título, descrição, horário programado e estado de conclusão.',
                'A regra de autorização do MVP atribui ao cuidador a criação, edição e remoção das tarefas. O usuário principal pode visualizar a rotina, consultar detalhes e registrar a conclusão. A regra está descrita nas Security Rules do Firestore, mas ainda não foi testada; portanto, o artigo não afirma que acessos indevidos foram efetivamente bloqueados.',
                4,
            ],
            [
                'communication', 'Comunicação', 'PILAR 02 · CAA',
                'A Comunicação Aumentativa e Alternativa associa símbolos a frases personalizadas para apoiar a expressão de necessidades e a comunicação.',
                'O artigo relata a implementação do requisito de símbolos de CAA associados a frases personalizadas. As referências acadêmicas discutem recursos visuais e comunicação assistiva, mas seus resultados pertencem aos estudos citados e não validam o ORI. Não são atribuídas ao módulo funções além das documentadas no artigo e no escopo do MVP.',
                5,
            ],
            [
                'personalization', 'Personalização', 'PILAR 03 · ACESSIBILIDADE',
                'Preferências de acessibilidade e personalização da interface integram a experiência, junto aos vínculos entre usuário principal e cuidador.',
                'A participação de quem cuida deve respeitar a autonomia e a participação do usuário principal. O artigo aponta como princípios de design a hierarquia visual clara, a navegação simplificada, a redução de elementos desnecessários, interações previsíveis e personalização. Esses princípios orientam o desenvolvimento, mas não substituem uma avaliação de acessibilidade.',
                6,
            ],
            [
                'foundations', 'Fundamentação teórica e acessibilidade', 'TECNOLOGIA ASSISTIVA · CAA · TEACCH',
                'A fundamentação aborda tecnologia assistiva, acessibilidade digital, CAA, rotinas estruturadas, personalização e previsibilidade das interações.',
                'O TEACCH é uma referência teórica na discussão sobre abordagens visuais estruturadas para rotinas; não é um dos três pilares do ORI. A literatura orienta requisitos e decisões de design, não comprova a eficácia do artefato. O artigo ressalta que tecnologia assistiva deve ser considerada a partir da participação e das necessidades das pessoas, e não apenas da disponibilidade de uma função digital.',
                7,
            ],
            [
                'architecture', 'Arquitetura e tecnologias', 'CLIENTE ANDROID · SERVIÇOS FIREBASE',
                'O aplicativo móvel usa Kotlin, Jetpack Compose, Material 3, MVVM, StateFlow, Hilt e Navigation Compose.',
                'Apresentação: cliente Android nativo com telas e navegação por módulo. Identidade: Firebase Authentication cuida de credenciais, autenticação e identificador firebaseUid. Dados de domínio: Cloud Firestore armazena rotina, vínculos, conteúdo CAA e preferências. Autorização: Firestore Security Rules aplica a política de acesso; implementada, ainda não testada. Lógica de servidor: Cloud Functions em Node.js e TypeScript poderiam concentrar regras adicionais; no artigo e no repositório consultado, o projeto está inicializado, mas não há funções implementadas. O SQLite deste site guarda somente contas e conteúdo institucional e não substitui o Firebase nem se conecta a dados pessoais do app.',
                8,
            ],
            [
                'methodology', 'Metodologia e avaliação', 'PESQUISA APLICADA · EXPLORATÓRIA · DESCRITIVA',
                'O percurso combina levantamento bibliográfico, análise documental, consolidação de requisitos, modelagem, prototipação no Figma e desenvolvimento.',
                'A avaliação funcional planejada é baseada em cenários com contas dedicadas e condições iniciais documentadas. Cada registro deve conter identificador do caso, requisito relacionado, versão, dispositivo e Android, condição de rede, executor, etapas, resultado esperado e obtido, status e evidência. Os status previstos são aprovado, reprovado, bloqueado e não executado. O índice de aprovação é calculado por casos aprovados dividido pela soma de aprovados e reprovados, multiplicado por 100; bloqueados e não executados são reportados à parte, sempre com contagens absolutas. Operações críticas devem ser repetidas três vezes por configuração de referência. Esses testes podem verificar conformidade e revelar defeitos, mas não demonstram usabilidade, acessibilidade para a população-alvo, benefício clínico ou aumento de autonomia. No estágio descrito no artigo, os testes formais ainda não haviam sido executados.',
                9,
            ],
            [
                'team-status', 'Equipe, contexto acadêmico e estágio atual', '9º ENGETEC · FATEC ZONA LESTE · 2026',
                'Autores: Mariana dos Santos Moreira, Matheus Mendonça de Lima e Nicollas Lopes Costa. Orientador: Prof. Jeferson Roberto de Lima.',
                'Projeto desenvolvido no curso de Desenvolvimento de Sistemas da ETEC Zona Leste, no modelo AMS (Articulação da Formação Profissional Média e Superior) e no programa P-Tech, em parceria institucional com a IBM. O artigo foi apresentado no 9º Encontro de Gestão e Tecnologia da Fatec Zona Leste. Há uma divergência de estágio nas fontes: o artigo final classifica FR01–FR11 como implementados, enquanto o README ainda lista rotina, comunicação e vínculos como em desenvolvimento. O código consultado contém uma tela e ViewModel de rotina e modelos de tarefa e vínculo; a presença desses arquivos não comprova que todos os fluxos estejam funcionais. O artigo também afirma que as regras de autorização do Firestore foram implementadas, mas a cópia pública do repositório consultada não contém um arquivo firestore.rules nem configuração de implantação dessas regras, então sua implementação não pôde ser inspecionada. As regras e os fluxos ainda não foram verificados pelo protocolo de testes. Estão explicitamente fora de escopo: geração automática de rotinas por inteligência artificial, monitoramento avançado de comportamento, diagnósticos ou acompanhamento clínico, gamificação, relatórios complexos e sistemas avançados de notificações.',
                10,
            ],
        ];

        foreach ($records as [$key, $title, $badge, $summary, $details, $order]) {
            InstitutionalContent::updateOrCreate(
                ['seed_key' => $key],
                [
                    'section' => $key,
                    'badge' => $badge,
                    'title' => $title,
                    'summary' => $summary,
                    'details' => $details,
                    'display_order' => $order,
                    'is_active' => true,
                ],
            );
        }
    }
}
