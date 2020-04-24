<?php

namespace Xitox97\LaravelOpendota;

use Illuminate\Support\Facades\Http;

class LaravelOpendota
{


    public function __construct()
    {
        $this->api_url = 'https://api.opendota.com/api/';
    }

    /**
     * Get player details based on player dota 2 ID
     */
    public function getPlayer($player_id)
    {
        return Http::get($this->api_url . 'players/' . $player_id);
    }

    /**
     * Get player Win/Loss count
     */
    public function getPlayerWL($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/wl', $params);
    }

    /**
     * Get player Recent matches played
     */
    public function getPlayerRecentMatches($player_id)
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/recentMatches');
    }

    /**
     * Get player Matches played
     */
    public function getPlayerMatches($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/matches', $params);
    }

    /**
     * Get player Heroes played
     */
    public function getPlayerHeroes($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/heroes', $params);
    }

    /**
     * Get Players played with
     */
    public function getPlayerPeers($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/peers', $params);
    }

    /**
     * Get Pro players played with the player
     */
    public function getPlayerPros($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/pros', $params);
    }

    /**
     * Get player's Totals in stats
     */
    public function getPlayerTotals($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/totals', $params);
    }

    /**
     * Get player's Counts in categories
     */
    public function getPlayerCounts($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/counts', $params);
    }

    /**
     * Get player's Counts in categories
     * @param int $player_id {account_id}
     * @param string $field = "" A field to aggregate on
     * @param mixed $params = [] Assoc array of parameters applied (see OpenDota docs for reference)
     */
    public function getPlayerHistograms($player_id, $field = "", $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/histograms/' . $field , $params);
    }

    /**
     * Get player's Wards placed in matches played
     * @param int $player_id {account_id}
     * @param mixed $params = [] Assoc array of parameters applied (see OpenDota docs for reference)
     */
    public function getPlayerWardmap($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/wardmap', $params);
    }

    /**
     * Get player's Words said/read in matches played
     * @param int $player_id {account_id}
     * @param mixed $params = [] Assoc array of parameters applied (see OpenDota docs for reference)
     */
    public function getPlayerWordcloud($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/wordcloud', $params);
    }

    /**
     * Get player's Player rating history
     * @param int $player_id {account_id}
     * @param mixed $params = [] Assoc array of parameters applied (see OpenDota docs for reference)
     */
    public function getPlayerRatings($player_id, $params = [])
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/ratings', $params);
    }

    /**
     * Get player's hero rankings
     * @param int $player_id {account_id}
     */
    public function getPlayerRankings($player_id)
    {
        return Http::get($this->api_url . 'players/' . $player_id . '/rankings');
    }

    /**
     * Request for refresh player match history
     * @param int $player_id {account_id}
     */
    public function postPlayerRefresh($player_id)
    {
        return Http::post($this->api_url . 'players/' . $player_id . '/refresh');
    }

    /**
     * Get match details based on match ID
     */
    public function getMatch($match_id)
    {
        return Http::get($this->api_url . 'matches/' . $match_id);
    }

    /**
     * Players ordered by rank/medal tier
     */
    public function getPlayersByRank()
    {
        return Http::get($this->api_url . 'playersByRank');
    }

    /**
     * Get list of pro players
     */
    public function getProPlayers()
    {
        return Http::get($this->api_url . 'proPlayers');
    }

    /**
     * Get list of pro matches
     */
    public function getProMatches()
    {
        return Http::get($this->api_url . 'proMatches');
    }

    /**
     * Get list of randomly sampled public matches
     */
    public function getPublicMatches()
    {
        return Http::get($this->api_url . 'publicMatches');
    }

    /**
     * Get list of parsed match IDs
     */
    public function getParsedMatches()
    {
        return Http::get($this->api_url . 'parsedMatches');
    }

    /**
     * Get Site metadata
     */
    public function getMetadata()
    {
        return Http::get($this->api_url . 'metadata');
    }

    /**
     * Get Distributions of MMR data by bracket and country
     */
    public function getDistributions()
    {
        return Http::get($this->api_url . 'distributions');
    }

    /**
     * Search players by personaname.
     */
    public function searchPlayers($personaname)
    {
        return Http::get($this->api_url . 'search', ['q' => $personaname]);
    }

    /**
     * Get Top players by hero
     */
    public function getRankingsByHero($hero_id)
    {
        return Http::get($this->api_url . 'rankings', ['hero_id' => $hero_id]);
    }

    /**
     * Get Benchmarks of average stat values for a hero
     */
    public function getBenchmarks($hero_id)
    {
        return Http::get($this->api_url . 'benchmarks', ['hero_id' => $hero_id]);
    }

    /**
     * Get current service statistics
     */
    public function getStatus()
    {
        return Http::get($this->api_url . 'status');
    }

    /**
     * Get service health data
     */
    public function getHealth()
    {
        return Http::get($this->api_url . 'health');
    }

    /**
     * Get parse request state
     * @param string $job_id {jobid} The job ID to query.
     */
    public function getRequest($job_id)
    {
        return Http::get($this->api_url . 'request/' . $job_id);
    }

    /**
     * Submit a new parse request
     * @param string $match_id {match_id}
     */
    public function postRequest($match_id)
    {
        return Http::get($this->api_url . 'request/' . $match_id);
    }

    /**
     * Get All heroes data
     */
    public function getHeroes()
    {
        return Http::get($this->api_url . 'heroes');
    }

    /**
     * Get recent matches with a hero
     */
    public function getHeroMatches($hero_id)
    {
        return Http::get($this->api_url . 'heroes/' . $hero_id . '/matches');
    }

    /**
     * Get results against other heroes for a hero
     */
    public function getHeroMatchups($hero_id)
    {
        return Http::get($this->api_url . 'heroes/' . $hero_id . '/matchups');
    }

    /**
     * Get hero performance over a range of match durations
     */
    public function getHeroDurations($hero_id)
    {
        return Http::get($this->api_url . 'heroes/' . $hero_id . '/durations');
    }

    /**
     * Get players who have played this hero
     */
    public function getHeroPlayers($hero_id)
    {
        return Http::get($this->api_url . 'heroes/' . $hero_id . '/players');
    }

    /**
     * Get item popularity of hero categoried by start, early, mid and late game, analyzed from professional games
     */
    public function getHeroItemPopularity($hero_id)
    {
        return Http::get($this->api_url . 'heroes/' . $hero_id . '/itemPopularity');
    }

    /**
     * Get stats about hero performance in recent matches
     */
    public function getHeroStats()
    {
        return Http::get($this->api_url . 'heroStats');
    }

    /**
     * Get league data
     */
    public function getLeagues()
    {
        return Http::get($this->api_url . 'leagues');
    }

    /**
     * Get team data
     */
    public function getTeams()
    {
        return Http::get($this->api_url . 'teams');
    }

    /**
     * Get data for a team
     */
    public function getTeam($team_id)
    {
        return Http::get($this->api_url . 'teams/' . $team_id);
    }

    /**
     * Get matches for a team
     */
    public function getTeamMatches($team_id)
    {
        return Http::get($this->api_url . 'teams/' . $team_id . '/matches');
    }

    /**
     * Get players who have played for a team
     */
    public function getTeamsPlayer($team_id)
    {
        return Http::get($this->api_url . 'teams/' . $team_id . '/players');
    }

    /**
     * Get heroes for a team
     */
    public function getTeamsHeroes($team_id)
    {
        return Http::get($this->api_url . 'teams/' . $team_id . '/heroes');
    }

    /**
     * Get data to construct a replay URL with
     */
    public function getReplays($match_id)
    {
        return Http::get($this->api_url . 'replays', ['match_id' => $match_id]);
    }

    /**
     * Get top currently ongoing live games
     */
    public function getLive()
    {
        return Http::get($this->api_url . 'live');
    }

}
