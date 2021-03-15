@php /** @var App\Models\Test\TestQuestion $question */ @endphp

<x-layouts.app title="{{ $title }}">
    <div class="mt-3 md:mt-4 mx-auto px-4 md:px-8 text-blue-400 max-w-full">
        <p class="text-5xl text-center">{{ __('Rules of NFSU Cup') }}</p>
        <div class="flex my-4">
            <div class="px-4 md:px-6 w-2/3 border-r border-blue-400">
                <p class="text-3xl text-center mb-2">{{ __('Rules') }}</p>
                <p class="text-xl mb-4">{{ __('1. Overall information') }}</p>
                <div class="space-y-2.5">
                    <p>{!! __('NFSU Cup consists of 4&nbsp;types of tourneys: Circuit, Sprint, Drag and Drift. Each tourney has 4&nbsp;regular rounds and 1&nbsp;final round. For Circuit and Drift tourneys regular round game consists of 6&nbsp;laps, final round&nbsp;&mdash; of 10&nbsp;laps. In each game can take part up to 4&nbsp;players.') !!} </p>
                    <p>{!! __('Only 4 players with maximum points after 4th&nbsp;round are allowed to play in the final round. If some players after 4th&nbsp;round have the same points and it is not clear who will be in the final, these players must race one more race. After the final round, 3&nbsp;players with maximum total points after all games (not only in final) becomes tourney winners and get trophies.') !!}</p>
                    <p>{!! __('In Drag and Sprint tourneys the final round will be played 4&nbsp;times to discover the strongest player in the tourney, not just luckiest. Points for each game will be earned like in a regular round (but they will not be added to player standings, just to define places in the final game). After these 4&nbsp;games players will be arranged by earned points and get their points for final round.') !!}</p>
                    <p>{!! __('Points system: <br>Regular round: <br>1st place&nbsp;&mdash; 5 points <br>2nd place&nbsp;&mdash; 3 points <br>3rd place&nbsp;&mdash; 2 points <br>4th place&nbsp;&mdash; 1 point <br><br>Final round:<br>1st place&nbsp;&mdash; 10 points<br>2nd place&nbsp;&mdash; 6 points<br>3rd place&nbsp;&mdash; 4 points<br>4th place&nbsp;&mdash; 2 points<br>') !!}</p>
                    <p>{!! __('In the event that after any round, in any group the players showed exactly the same result, one additional race is held between them. As a result of this race, the places in this group are finally determined. The same place in one group is not allowed.') !!}</p>
                    <p>{!! __('Your set of TJ parts must meet following conditions: <br> 1. You must have not more than three TJ parts.<br>2. You must have at least one part from first group (Engine, Transmission, Tires). <br>3. You must have not more than two parts from second group (ECU, Turbo, Brake Kit).<br>4. You must have not more than one part from third group (Weight Reduction, Suspension, NOS).<br>') !!}</p>
                    <p>{!! __('Double steering (DS):<br>Double steering is prohibited on the tourney. DS game bug puts the players with wheel and players with keyboard on an unequal position. Encourage fair play in all players in the tourney.') !!}</p>
                </div>

                <p class="text-xl my-4">{{ __('2. Registration & Sign Up') }}</p>
                <div class="space-y-2.5">
                    <p>{!! __('Taking part in the tourneys is allowed only for registered players. You can fill out the registration form on this site. During registration you will be prompted to provide your nickname from www.nfsu-cup.com (31.131.19.86) online server, your email. After successful registration you must pass the test on this rules. After that you will be allowed to take part in the tourneys.') !!}</p>
                    <p>{!! __('Only signed up players can participate in the online tourneys. Sign up period could be 15-120 minutes before the tourney starts. You can check it on the tourneys page (see main menu of the site). You can sign up from this site during allowed period of time. Right after sign up period is finished you must be present in the tourney room, otherwise tourney supervisor has rights to exclude you from a current tourney.') !!}</p>
                </div>

                <p class="text-xl my-4">{{ __('3. During tourney') }}</p>
                <div class="space-y-2.5">
                    <p>{!! __('During tourneys you must follow tourney supervisor commands . After the round start announcement, you should look at the site ("Tourneys" section) and find out in which groups you are playing. Player #1 of each group is a game host. If you was assigned to host game, you should inform your opponents by the game chat, after that you can create game according to a tourney type. If someone is not joining to the game or not responding for more than 2 minutes after you have announced the game start&nbsp;&mdash; game must be started without this player.') !!}</p>
                    <p>{!! __('If someone was disconnected before GO command within game, this game should be replayed. If disconnect happened after GO, this player gets position according to final race standings. After game was finished, player #1 (host) should tell game results. Results must be told to the game chat and to tourney supervisor. All other players also have to remember positions of all their opponents.') !!}</p>
                    <p>{!! __('In the case where a drag race no player will reach the finish line, race must be replayed.') !!}</p>
                    <p>{!! __('If somebody cannot join to the host player after several attempts, you should change host player. If all variants were tried and still no success, you need to inform supervisor about this.') !!}</p>
                    <p>{!! __('Bump into other cars is allowed during a race, but it is not welcome.') !!}</p>
                </div>

                <p class="text-xl my-4">{{ __('4. Communication during tourney') }}</p>
                <div class="space-y-2.5">
                    <p>{!! __('All communication between players must be at the game chat. You must be there before sign up period ends. During the tourney in the chat room must be present only those who are participating in the current tourney.') !!}</p>
                    <p>{!! __('When you are in the tourney room, following things are prohibited:<br>1. Give offence to other players or saying swearing words. <br>2. Using Russian or any other national symbols except English. Have some respect to players from other countries who will have weird symbols on their screen. <br>3. Offtopic or flood. It is prohibited to talk about anything not related to current tourney in the game chat. Use private messages (but if you will miss start of the next round or something else - it will be your fault). <br>4. Tell results like "player1 player2 player3 player4" because it is not clear what this list is. It is necessary to say that it is result of specific round and specific game. Much better looks "R2G2 1-player1 2-player2 3-player3 4-player4".') !!}</p>
                </div>

                <p class="text-xl my-4">{{ __('5. Time zone') }}</p>
                <div class="space-y-2.5">
                    <p>{!! __('All dates on this site is are in Europe/Minsk (UTC+3:00) time zone.') !!}</p>
                    <p>{!! __('For reference time in three capitals:<br>Moscow &mdash; UTC (+3:00)<br>Minsk &mdash; UTC (+3:00)<br>Kyiv &mdash; UTC (+2:00) when DST started, UTC (+1:00) when DST ended.') !!}</p>
                </div>
            </div>
            <div class="px-4 md:px-6 flex-1">
                <p class="text-3xl text-center mb-2">{{ __('Quiz') }}</p>
                <p class="text-xl pb-2 border-b border-blue-400">{{ __('Try to answer on these questions and check your understanding of the rules') }}:</p>
                <form action="{{ route('rules.check') }}" method="post">
                    @csrf
                    @forelse($questions as $question)
                        <div class="p-2 border-b border-blue-400">
                            <p class="text-lg">{{ $question->question }}</p>
                            @foreach($question->answers->shuffle() as $answer)
                                <div>
                                    <input
                                        id="{{ $answer->id }}"
                                        type="radio"
                                        name="quiz-form[{{ $question->id }}]"
                                        value="{{$answer->index}}"
                                    >
                                    <label class="pl-4" for="{{ $answer->id }}">
                                        {{ $answer->answer }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <p>{{ __('No questions found.') }}</p>
                    @endforelse

                    @error('quiz-form')<p class="text-red-500 mt-1 text-xs">{{ $message }}</p>@enderror
                    <div class="mt-3">
                        <button
                            type="submit"
                            class="px-4 py-2 text-white bg-blue-500 rounded-lg"
                        >
                            {{ __('Check') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
